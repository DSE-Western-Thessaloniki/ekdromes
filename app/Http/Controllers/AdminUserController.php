<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::query()->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        ]);

        User::create($validated + ['active' => true]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Ο διαχειριστής προστέθηκε επιτυχώς.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $deleted = DB::transaction(function () use ($user): bool {
            $users = User::query()->lockForUpdate()->get(['id']);

            if ($users->count() <= 1) {
                return false;
            }

            return (bool) User::query()->whereKey($user->getKey())->delete();
        });

        if (! $deleted) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Δεν είναι δυνατή η διαγραφή του τελευταίου διαχειριστή.');
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'Ο διαχειριστής διαγράφηκε επιτυχώς.');
    }
}
