<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcursionWizardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return match ($request->input('step')) {
            '>ΕΔ_ERASM' => view('excursion.wizard.ed_erasm'),
            '>ERASMUS' => view('excursion.wizard.erasmus'),
            '>ERASMUS>ΜΟΝΟΕΚΠ' => view('excursion.wizard.erasmus_monoekp'),
            '>ERASMUS>ΕΚΠΜΑΘ' => view('excursion.wizard.erasmus_ekpmath'),
            '>ΕΔ' => view('excursion.wizard.ed'),
            '>ΕΔ>ΒΡΑΒΕΥΣΗ' => view('excursion.wizard.ed_brabreush'),
            '>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ' => view('excursion.wizard.ed_oxi_brabreush'),
            '>ΕΔ>ΒΡΑΒΕΥΣΗ>ΑΔΕΛ' => view('excursion.wizard.ed_brabreush_adel'),
            '>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ' => view('excursion.wizard.ed_oxi_brabreush_oxi_adel'),
            '>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ>ΘΡΗΣΚ' => view('excursion.wizard.ed_oxi_brabreush_oxi_adel_thrisk'),
            '>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ>ΟΧΙΑΔΕΛ>ΟΧΙΘΡΗΣΚ' => view('excursion.wizard.ed_oxi_brabreush_oxi_adel_oxi_thrisk'),
            '>ΥΠΟΛΟΙΠΕΣ' => view('excursion.wizard.ypoloipes'),
            '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ' => view('excursion.wizard.ypoloipes_olo'),
            '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ' => view('excursion.wizard.ypoloipes_olo_1hm'),
            '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ>ΕΝΤΟΣ_Ω' => view('excursion.wizard.ypoloipes_olo_1hm_entos_o'),
            '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>1ΗΜ>ΠΛΕΟΝ_Ω' => view('excursion.wizard.ypoloipes_olo_1hm_pleon_o'),
            '>ΥΠΟΛΟΙΠΕΣ>ΟΛΟ>ΠΟΛΛΕΣΗΜ' => view('excursion.wizard.ypoloipes_olo_polleshm'),
            '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ' => view('excursion.wizard.ypoloipes_meros'),
            '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ' => view('excursion.wizard.ypoloipes_meros_esot'),
            '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>1ΗΜ' => view('excursion.wizard.ypoloipes_meros_esot_1hm'),
            '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ' => view('excursion.wizard.ypoloipes_meros_esot_polleshm'),
            '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ>ΤΕΛΤΑΞΗ' => view('excursion.wizard.ypoloipes_meros_esot_polleshm_teltaxi'),
            '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΣΩΤ>ΠΟΛΛΕΣΗΜ>ΟΧΙΤΕΛΤΑΞΗ' => view('excursion.wizard.ypoloipes_meros_esot_polleshm_ochi_teltaxi'),
            '>ΥΠΟΛΟΙΠΕΣ>ΜΕΡΟΣ>ΕΞΩΤ' => view('excursion.wizard.ypoloipes_meros_exot'),
            default => view('excursion.wizard.start'),
        };
    }
}
