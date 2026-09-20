import { SchoolRow } from "./SchoolRow";

export interface ExcursionRow {
  school: SchoolRow | null;
  ar_prot: string;
  ar_prot_sxoleiou: string;
  eidos_ekdromis: string;
  status: string;
  proorismos: string;
  hmera_ekdromis_anaxorisis: string;
  hmera_epistrofis: string;
  ar_mathiton: number | string;
  isDraft: boolean;
}
