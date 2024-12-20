<?php
/*=================================================
   charset=utf-8
   Project:	phpGedView
   File:	lang.no.php
   Author:	John Finlay
   Translator:	Geir Håkon Eikland
   Comments:	Norwegian Language file for PhpGedView
   Change Log:	See LANG_CHANGELOG.txt
   2005.02.19 "PhpGedView" and "GEDCOM" made consistent across all language files  G.Kroll (canajun2eh)
===================================================*/
# $Id: lang.no.php,v 1.1 2005/10/07 18:08:36 skenow Exp $

if (preg_match("/lang\...\.php$/", $_SERVER["PHP_SELF"])>0) {
	print "Du har ikke direkte tilgang til en språkfil.";
	exit;
}

$pgv_lang["changelog"]				= "Endringer i versjon #VERSION#";
$pgv_lang["html_block_descr"]		= "Dette er en enkel ramme som du kan legge på siden din for å vise en beskjed (i HTML-format).";
$pgv_lang["html_block_name"]		= "Rammen Enkle beskjeder (HTML)";
$pgv_lang["num_to_show"]			= "Antall deler som skal vises";
$pgv_lang["days_to_show"]			= "Antall dager som skal vises";
$pgv_lang["config_block"]			= "Rammen Konfigurere";
$pgv_lang["pls_note12"]				= "Bruk dette feltet for å beskrive hvorfor du ber om å få en konto på dette nettstedet og hvordan du er knyttet til noen i slektsdataene.";
$pgv_lang["enter_comments"]			= "Vennligst angi slektskapet ditt til dataene i feltet Kommentarer.";
$pgv_lang["comments"]				= "Kommentarer";
$pgv_lang["none"]					= "Ingen";
$pgv_lang["ahnentafel_report"]		= "Forfedre";
$pgv_lang["child-family"]			= "Foreldre og søsken";
$pgv_lang["spouse-family"]			= "Ektefelle og barn";
$pgv_lang["direct-ancestors"]		= "Forfedre i direkte linje";
$pgv_lang["ancestors"]				= "Forfedre i direkte linje og deres familier";
$pgv_lang["descendants"]			= "Etterkommere";
$pgv_lang["choose_relatives"]		= "Velg slektninger";
$pgv_lang["relatives_report"]		= "Slektninger";
$pgv_lang["total_living"]			= "Antall levende";
$pgv_lang["total_dead"]				= "Antall døde";
$pgv_lang["total_not_born"]			= "Antall ikke født enda";
$pgv_lang["remove_custom_tags"]		= "Fjern bruker-definerte merker i PGV (tags)? (f.eks. _PGVU, _THUM)";
$pgv_lang["cookie_login_help"]		= "Nettstedet ser at du har logget deg inn her tidligere.  Dette gjør at du nå har tilgang til privat informasjon og andre bruker-relaterte funksjoner. <br/>- Men for å kunne endre eller adiministere nettstedet, så må du av hensyn til sikkerhet logge deg inn på nytt.";
$pgv_lang["remember_me"]			= "Huske meg?";
$pgv_lang["add_unlinked_person"]	= "Legg til en person som ikke er knyttet til en familie";
$pgv_lang["fams_with_surname"]		= "Familier med etternavnet #surname#";
$pgv_lang["support_contact"]		= "Teknisk hjelp";
$pgv_lang["genealogy_contact"]		= "Slektsspørsmål";
$pgv_lang["continue_import"]		= "Fortsett å importere steder";
$pgv_lang["importing_places"]		= "Importerer steder";
$pgv_lang["common_upload_errors"]	= "Denne feilen skyldes sannsynligvis at filen som du prøvde å hente (upload) var for stor i forhold til grenser satt av verten til serveren.  Standard grense i PHP er 2MB.  Du kan prøve å kontakte eierene av serveren for å få dem til å heve denne grensen som er er angitt i filen php.ini, eller så kan du laste opp (upload) filen ved hjelp av FTP.  Bruk siden <a href=\"uploadgedcom.php?action=add_form\"><b>Legg til GEDCOM</b></a> for å legge til en GEDCOM-fil som du har lastet opp ved hjelp av FTP.";
$pgv_lang["total_memory_usage"]		= "Totalt bruk av minne:";
$pgv_lang["mothers_family_with"]	= "Familien til mor til ";
$pgv_lang["fathers_family_with"]	= "Familien til far til ";
$pgv_lang["halfbrother"]			= "Halv-bror";
$pgv_lang["halfsister"]				= "Halv-søster";
$pgv_lang["family_timeline"]		= "Vis familie på en tidslinje";
$pgv_lang["children_timeline"]		= "Vis barn på en tidslinje";
$pgv_lang["other"]					= "Annet";
$pgv_lang["sort_by_marriage"]		= "Sortert på dato for ekteskap";
$pgv_lang["reorder_families"]		= "Vis familier i annen rekkefølge";
$pgv_lang["indis_with_surname"]		= "Personer med etternavnet #surname#";
$pgv_lang["first_letter_fname"]		= "Velg en bokstav for å vise personer med fornavn som begynner på denne bokstaven.";
$pgv_lang["import_marr_names"]		= "Importere Navn som gift";
$pgv_lang["marr_name_import_instr"]	= "Du må BARE klikk på knappen under dersom du ønsker at PhpGedView skal kopiere etternavnet til ektemannen som Navn som gift for ektefellen i denne slektsbasen.  Dette vil gi deg mulighet til å søke og vise hustruer med etternavnet som gift.";
$pgv_lang["calc_marr_names"]		= "Kopierer ektemennenes navn";
$pgv_lang["total_names"]			= "Antall navn";

$pgv_lang["upload_file"]			= "Last opp (upload) fil fra datamaskinen din";
$pgv_lang["thumb_genned"]			= "Passfoto er lagd automatisk.";
$pgv_lang["thumbgen_error"]			= "Klarte ikke å lage passfoto for ";
$pgv_lang["generate_thumbnail"]		= "Lagde passfoto automatisk fra ";
$pgv_lang["no_upload"]				= "Klarte ikke å laste opp (upload) mediafiler fordi multi-media-filer ikke er aktivert eller fordi mediamappen/-katalogen ikke har skriverettighet.";
$pgv_lang["top10_pageviews_nohits"]	= "Det er ingen treff for denne siden.";
$pgv_lang["top10_pageviews_msg"]	= "Telleren må aktiveres i GEDCOM-konfigurasjonen for at denne rammen skal virke.";
$pgv_lang["review_changes_descr"]	= "Rammen Endringer på vent, vil gi brukere med rett til å endre opplysninger online, en mulighet til å se en endringsliste før disse er blitt godkjent.  Disse endringen kan enten bli godkjent eller forkastet.<br /><br />Dersom denne rammen er aktiv, vil brukere med rettighet til å godkjenne motta en e-post daglig som en påminning om å sjekke endringer.";
$pgv_lang["review_changes_block"]	= "Rammen Endringer på vent";
$pgv_lang["review_changes_subject"]	= "PhpGedView - Vis endringer";
$pgv_lang["review_changes_body"]	= "Endringer i slektsbasen er blitt gjort online.  Disse endringene må sjekkes og eventuelt godkjennes før de kan vises for alle brukere.  Vennligst bruk adressen (URL) under for å gå til PhpGedView på nettet for å se endringene (du må oppgi brukernavn og passord).";
$pgv_lang["show_spouses"]			= "Vis ektefeller";
$pgv_lang["quick_update_title"] 	= "Hurtig-oppdatering";
$pgv_lang["quick_update_instructions"] = "Denne siden gir deg mulighet til å foreta en hurtig-oppdatering av informasjon til en person.  Du trenger bare å fylle ut informasjon som er ny eller som skal endres.  Etter at endringene har blitt sendt, må de sjekks av en bruker med rett til å godkjenne før de blir vist for andre brukere.";
$pgv_lang["update_name"] 			= "Oppdater navn";
$pgv_lang["update_fact"] 			= "Oppdater en faktaopplysning";
$pgv_lang["update_fact_restricted"] = "Oppdatering av denne er begrenset:";
$pgv_lang["update_photo"] 			= "Oppdater bilde";
$pgv_lang["photo_replace"] 			= "Ønsker du å erstatte et eldre bilde med dette?";
$pgv_lang["select_fact"] 			= "Velg en faktaopplysning...";
$pgv_lang["update_address"] 		= "Oppdater adresse";
$pgv_lang["add_new_chil"] 			= "Legg til et nytt barn";
$pgv_lang["top10_pageviews_descr"]	= "Denne rammen vil vise de 10 mest viste personen/familiene.  Denne rammen krever at Telleren er aktivert i innstillingene for GEDCOM-konfigurasjonen.";
$pgv_lang["top10_pageviews"]		= "Vist flest ganger";
$pgv_lang["top10_pageviews_block"]	= "Rammen Vist flest ganger";
$pgv_lang["user_default_tab"]		= "Arkfanen som skal vises som standard på faktasiden til personer";
$pgv_lang["stepfamily"]				= "Ste-familie";
$pgv_lang["stepdad"]				= "Stefar";
$pgv_lang["stepmom"]				= "Stemor";
$pgv_lang["stepsister"]				= "Stesøster";
$pgv_lang["stepbrother"]			= "Stebror";
$pgv_lang["max_upload_size"]		= "Maks størrelse for opplasting: ";
$pgv_lang["edit_fam"]				= "Endre familie";
$pgv_lang["fams_charts"]			= "Valg for denne familien";
$pgv_lang["sort_by_birth"]			= "Sorter på fødselsdato";
$pgv_lang["reorder_children"]		= "Vis barn i annen rekkefølge";
$pgv_lang["add_from_clipboard"]		= "Legg til fra klippebordet: ";
$pgv_lang["record_copied"]			= "Poster kopiert til klippebordet";
$pgv_lang["copy"]					= "Kopier";
$pgv_lang["cut"]					= "Klipp ut";
$pgv_lang["indis_charts"]			= "Valg for denne personen";
$pgv_lang["edit_indi"] 				= "Endre person";
$pgv_lang["locked"]					= "Ikke gjør endringer";
$pgv_lang["privacy"]				= "Personvern";
$pgv_lang["RSS_block"]				= "Rammen RSS";

//-- GENERAL HELP MESSAGES
$pgv_lang["qm"]					= "<i>?</i>";
$pgv_lang["qm_ah"]				= "<i>?</i>";
$pgv_lang["page_help"]			= "Hjelp";
$pgv_lang["help_for_this_page"]	= "Hjelp for denne siden";
$pgv_lang["help_contents"]		= "Emner i Hjelp";
$pgv_lang["show_context_help"]	= "Vis Hjelp <b><i>?</i></b> til tekst";
$pgv_lang["hide_context_help"]	= "Skjul Hjelp <b><i>?</i></b> til tekst";
$pgv_lang["sorry"]				= "<b>Beklager, men vi er ikke ferdig med hjelpeteksten for denne siden eller delen enda...</b>";
$pgv_lang["help_not_exist"]		= "<b>Hjelpeteksten for denne siden eller delen er ikke lagt inn enda</b>";
$pgv_lang["resolution"]			= "Skjermoppløsning";
$pgv_lang["menu"]				= "Meny";
$pgv_lang["header"]				= "Toppfelt";
$pgv_lang["imageview"]			= "Bildeframviser";

//-- CONFIG FILE MESSAGES
$pgv_lang["login_head"]			= "PhpGedView innlogging for brukere";
$pgv_lang["error_title"]		= "FEIL: Kan ikke åpne GEDCOM filen";
$pgv_lang["error_header"] 		= "GEDCOM-filen [#GEDCOM#], finnes ikke på det angitte stedet.";
$pgv_lang["error_header_write"]	= "GEDCOM-filen [#GEDCOM#], er ikke skrivbar. Sjekk attributter og tilgangsrettigheter.";
$pgv_lang["for_support"]		= "For teknisk hjelp og informasjon, kontakt";
$pgv_lang["for_contact"]		= "For hjelp med slektsspørsmål, kontakt";
$pgv_lang["for_all_contact"]	= "For teknisk hjelp og slektsspørsmål, kontakt";
$pgv_lang["build_title"]		= "Bygger opp indeksfiler";
$pgv_lang["build_error"]		= "GEDCOM-fil har blitt oppdatert.";
$pgv_lang["please_wait"]		= "Vent litt - Bygger opp Indeksfilene på nytt.";
$pgv_lang["choose_gedcom"]		= "Velg et GEDCOM datasett";
$pgv_lang["username"]			= "Brukernavn";
$pgv_lang["invalid_username"]	= "Brukernavnet inneholder ugyldige tegn";
$pgv_lang["fullname"]			= "Fullt navn";
$pgv_lang["password"]			= "Passord";
$pgv_lang["confirm"]			= "Bekreft passord";
$pgv_lang["user_contact_method"]	= "Ønsket kontaktmetode";
$pgv_lang["login_aut"]			= "Endre bruker";
$pgv_lang["login"]				= "Logg inn";
$pgv_lang["logout"]				= "Logg ut";
$pgv_lang["admin"]				= "Admin";
$pgv_lang["logged_in_as"]		= "Logget inn som ";
$pgv_lang["my_pedigree"]		= "Mitt anetre";
$pgv_lang["my_indi"]			= "Meg selv";
$pgv_lang["yes"]				= "Ja";
$pgv_lang["no"]					= "Nei";
$pgv_lang["add_gedcom"]			= "Legg til en GEDCOMfil";
$pgv_lang["no_support"]			= "Vi har oppdaget at nettleseren din ikke støtter funksjoner på denne siden. De fleste nettlesere støtter dette i nyere versjoner. Vennligst oppgrader nettleseren din til en nyere versjon.";
$pgv_lang["change_theme"]		= "Bytt stil";
$pgv_lang["gedcom_downloadable"]	= "<br />Besøkende på nettstedet ditt kan laste ned (download) denne GEDCOM-filen!<br />Les mer om dette i filen <a href=\"".(file_exists('readme-norsk.txt')?"readme-norsk.txt":"readme.txt")."\">readme".(file_exists('readme-norsk.txt')?"-norsk":"").".txt</a> i avsnittet 12. SIKKERHET / PERSONVERN<br />for å finne en løsning på dette.";

//-- INDEX (PEDIGREE_TREE) FILE MESSAGES
$pgv_lang["index_header"]		= "Anetre";
$pgv_lang["gen_ped_chart"]		= "Anetre - #PEDIGREE_GENERATIONS# slektsledd";
$pgv_lang["generations"]		= "Slektsledd&nbsp;";
$pgv_lang["view"]				= "Vis";
$pgv_lang["fam_spouse"]			= "Familie med partner";
$pgv_lang["root_person"]		= "ID til startperson&nbsp;";
$pgv_lang["hide_details"]		= "Skjul detaljer";
$pgv_lang["show_details"]		= "Vis detaljer";
$pgv_lang["person_links"]		= "Linker til diagram, familie(r), og nære slektninger til denne personen. - Klikk her for å vise denne personen som startperson i diagrammet.";
$pgv_lang["zoom_box"]			= "Zoom denne boksen inn/ut";
$pgv_lang["portrait"]			= "Stående tre";
$pgv_lang["landscape"]			= "Liggende tre";
$pgv_lang["start_at_parents"]	= "Start med foreldrene";
$pgv_lang["charts"]				= "Diagram";
$pgv_lang["lists"]				= "Lister";
$pgv_lang["welcome_page"]		= "Hovedside";
$pgv_lang["max_generation"]		= "Du kan vise maks #PEDIGREE_GENERATIONS# slektsledd!";
$pgv_lang["min_generation"]		= "Du må vise minst 3 slektsledd!";
$pgv_lang["box_width"]			= "Boksbredde";

//-- FUNCTIONS FILE MESSAGES
$pgv_lang["unable_to_find_family"]	= "Kan ikke finne familien med id ";
$pgv_lang["unable_to_find_indi"]	= "Kan ikke finne personen med id ";
$pgv_lang["unable_to_find_record"]	= "Kan ikke finne posten med id ";
$pgv_lang["unable_to_find_source"]	= "Kan ikke finne kilden med id ";
$pgv_lang["unable_to_find_repo"]	= "Kan ikke finne oppbevaringssted med id ";
$pgv_lang["repo_name"]			= "Navn på oppbevaringssted:";
$pgv_lang["address"]			= "Adresse:";
$pgv_lang["phone"]				= "Tlf:";
$pgv_lang["source_name"]		= "Kildenavn:";
$pgv_lang["title"]				= "Tittel:";
$pgv_lang["author"]				= "Forfatter:";
$pgv_lang["publication"]		= "Publikasjon:";
$pgv_lang["call_number"]		= "Arkivnr./ISBN/ISSN:";
$pgv_lang["living"]				= "Lever";
$pgv_lang["private"]			= "Privat";
$pgv_lang["birth"]				= "Født:";
$pgv_lang["death"]				= "Død:";
$pgv_lang["descend_chart"]		= "Etterkommere";
$pgv_lang["individual_list"]	= "Personer";
$pgv_lang["family_list"]		= "Familier";
$pgv_lang["source_list"]		= "Kilder";
$pgv_lang["place_list"]			= "Stedsnavn";
$pgv_lang["place_list_aft"] 	= "Stedsnavn etter";
$pgv_lang["media_list"]			= "Bilder / medier";
$pgv_lang["search"]				= "Søk";
$pgv_lang["clippings_cart"]		= "Utklippsmappe";
$pgv_lang["not_an_array"]		= "Ikke en tabell";
$pgv_lang["print_preview"]		= "Utskrifts-vennlig utgave";
$pgv_lang["cancel_preview"]		= "Tilbake til vanlig visning";
$pgv_lang["change_lang"]		= "Velg språk (Language)";
$pgv_lang["print"]				= "Skriv ut";
$pgv_lang["total_queries"]		= "Antall søk i databasen:";
$pgv_lang["total_privacy_checks"]	= " - Antall kontroller av personvern: ";
$pgv_lang["back"]				= "Tilbake";
$pgv_lang["privacy_list_indi_error"]	= "Av hensyn til personvern, er en eller flere personer skjult.";
$pgv_lang["privacy_list_fam_error"]	= "Av hensyn til personvern, er en eller flere familier skjult.";

//-- INDIVDUAL FILE MESSAGES
$pgv_lang["aka"]				= "Også kjent som";
$pgv_lang["male"]				= "Mann";
$pgv_lang["female"]				= "Kvinne";
$pgv_lang["temple"]				= "Mormoner-tempel";
$pgv_lang["temple_code"]		= "Mormoner-tempel-kode:";
$pgv_lang["status"]				= "Status";
$pgv_lang["source"]				= "Kilde";
$pgv_lang["citation"]			= "Henvisning:";
$pgv_lang["text"]				= "Kildetekst:";
$pgv_lang["note"]				= "Note";
$pgv_lang["NN"]					= "Ukjent";
$pgv_lang["PN"]					= "(<i>ukjent</i>)";
$pgv_lang["unrecognized_code"]	= "Ukjent GEDCOM-kode";
$pgv_lang["unrecognized_code_msg"]	= "Dette er en feil som vi ønsker å rette på. Vennligst rapporter denne feilen til";
$pgv_lang["indi_info"]			= "Person-opplysninger";
$pgv_lang["pedigree_chart"]		= "Anetre";
$pgv_lang["desc_chart2"]		= "Etterkommere";
$pgv_lang["family"]				= "Familie";
$pgv_lang["family_with"]		= "Familie med";
$pgv_lang["as_spouse"]			= "Familie med ektefelle/partner";
$pgv_lang["as_child"]			= "Familie med foreldre";
$pgv_lang["view_gedcom"]		= "Vis GEDCOM post";
$pgv_lang["add_to_cart"]		= "Legg til i utklippsmappen";
$pgv_lang["still_living_error"]	= "Personen lever fremdeles eller har ikke noen datoer for fødsel eller dødsfall. Alle opplysninger om levende personer er skjult for offentligheten.<br />For ytterligere informasjon kontakt";
$pgv_lang["privacy_error"]		= "Opplysninger om denne personen er privat.<br />";
$pgv_lang["more_information"]	= "For mer informasjon, kontakt";
$pgv_lang["name"]				= "Navn";
$pgv_lang["given_name"]			= "Fornavn:";
$pgv_lang["surname"]			= "Etternavn:";
$pgv_lang["suffix"]				= "Suffiks:";
$pgv_lang["object_note"]		= "Note for objekt:";
$pgv_lang["sex"]				= "Kjønn";
$pgv_lang["personal_facts"]		= "Fakta og detaljer om personen";
$pgv_lang["type"]				= "Type";
$pgv_lang["date"]				= "Dato";
$pgv_lang["place_description"]	= "Sted / Beskrivelse";
$pgv_lang["parents"] 			= "Foreldre:";
$pgv_lang["siblings"] 			= "Søsken";
$pgv_lang["father"] 			= "Far";
$pgv_lang["mother"] 			= "Mor";
$pgv_lang["relatives"]			= "Nære slektninger";
$pgv_lang["child"]				= "Barn";
$pgv_lang["spouse"]				= "Ektefelle/partner";
$pgv_lang["surnames"]			= "Etternavn";
$pgv_lang["adopted"]			= "Adoptert";
$pgv_lang["foster"]				= "Fosterbarn";
$pgv_lang["sealing"]			= "Kobling";
$pgv_lang["challenged"]			= "Innsigelser";
$pgv_lang["disproved"]			= "Motbevist";
$pgv_lang["link_as"]			= "Knytt denne person til en eksisterende familie som ";
$pgv_lang["no_tab1"]			= "Det er ikke noen fakta / opplysninger om denne personen.";
$pgv_lang["no_tab2"]			= "Det er ikke noen noter for denne personen.";
$pgv_lang["no_tab3"]			= "Det er ikke noen kilder knyttet til denne personen.";
$pgv_lang["no_tab4"]			= "Det er ikke noen bilder eller andre medier knyttet til denne personen.";
$pgv_lang["no_tab5"]			= "Det er ikke noen nære slektninger knyttet til denne personen.";
$pgv_lang["no_tab6"]			= "Det er ikke noen forsker-logg knyttet til denne personen.";

//-- FAMILY FILE MESSAGES
$pgv_lang["family_info"]		= "Familie-opplysninger";
$pgv_lang["family_group_info"]	= "Familie-opplysninger";
$pgv_lang["husband"]			= "Ektemann";
$pgv_lang["wife"]				= "Hustru";
$pgv_lang["marriage"]			= "Bryllup:";
$pgv_lang["lds_sealing"]		= "Mormoner kobling:";
$pgv_lang["marriage_license"]	= "Ekteskapsattest:";
$pgv_lang["media_object"]		= "Bilder eller andre medier:";
$pgv_lang["children"]			= "Barn";
$pgv_lang["no_children"]		= "<i>Ingen registerte barn</i>";
$pgv_lang["parents_timeline"]	= "Vis partnere på en tidslinje";

//-- CLIPPINGS FILE MESSAGES
$pgv_lang["clip_cart"]			= "Utklippsmappe";
$pgv_lang["clip_explaination"]	= "Utklippsmappen gir deg muligheten til å \"klippe ut\" deler av dette slektstreet og samle utklippene i en ny GEDCOM-fil, som kan lastes ned (download).<br /><br />";
$pgv_lang["item_with_id"]		= "Objekt med id";
$pgv_lang["error_already"]		= "finnes fra før i utklippsmappen.";
$pgv_lang["which_links"]		= "Hvilket utvalg for denne familien vil du legge til?";
$pgv_lang["just_family"]		= "Legg bare til denne familien.";
$pgv_lang["parents_and_family"]	= "Legg til denne familien og foreldre.";
$pgv_lang["parents_and_child"]	= "Legg til denne familien, foreldre og barn.";
$pgv_lang["parents_desc"]		= "Legg til denne familien, foreldre og alle etterkommere.";
$pgv_lang["continue"]			= "Fortsett med å legge til";
$pgv_lang["which_p_links"]		= "Hvilket utvalg for denne personen vil du legge til?";
$pgv_lang["just_person"]		= "Legg bare til denne personen.";
$pgv_lang["person_parents_sibs"]	= "Legg til denne personen, foreldre og søsken.";
$pgv_lang["person_ancestors"]		= "Legg til denne personen og slektninger i direkte linje.";
$pgv_lang["person_ancestor_fams"]	= "Legg til denne personen og slektninger i direkte linje med deres familier.";
$pgv_lang["person_spouse"]		= "Legg til denne personen, samt ektefelle/partner og barn.";
$pgv_lang["person_desc"]		= "Legg til denne personen, ektefelle/partner, og alle etterkommere.";
$pgv_lang["unable_to_open"]		= "Kan ikke kopiere til utklippsmappen";
$pgv_lang["person_living"]		= "Denne personen lever fortsatt. Personlige data vises derfor ikke.";
$pgv_lang["person_private"]		= "Data for denne personen er private. Personlige data vises derfor ikke.";
$pgv_lang["family_private"]		= "Data for denne familien er private. Familiære data vises derfor ikke.";
$pgv_lang["download"]			= "Høyreklikk (control-click på Mac) på linken under og Velg \"Lagre som\" for å laste ned (download) filene.";
$pgv_lang["media_files"]		= "Bilder eller medie-filer som er knyttet til denne slektsbasen";
$pgv_lang["cart_is_empty"]		= "<b>Utklippsmappen din er tom!</b>";
$pgv_lang["id"]					= "ID";
$pgv_lang["name_description"]	= "Navn / beskrivelse";
$pgv_lang["remove"]				= "Fjern";
$pgv_lang["empty_cart"]			= "Tøm mappen";
$pgv_lang["download_now"]		= "Laste ned (download) nå";
$pgv_lang["indi_downloaded_from"]	= "Denne personen er hentet fra:";
$pgv_lang["family_downloaded_from"]	= "Denne familien er hentet fra:";
$pgv_lang["source_downloaded_from"]	= "Denne kilden er hentet fra:";

//-- PLACELIST FILE MESSAGES
$pgv_lang["connections"]		= " stedsnavn som inneholder";
$pgv_lang["top_level"]			= "Lands-/toppnivå";
$pgv_lang["form"]				= "Stedsnavn lagret som: ";
$pgv_lang["default_form"]		= "Grend/bydel, sted/by, kommune/sogn, fylke/region, land";
$pgv_lang["default_form_info"]	= "(Standard)";
$pgv_lang["gedcom_form_info"]	= "(GEDCOM)";
$pgv_lang["unknown"]			= "Ukjent";
$pgv_lang["individuals"]		= "Personer";
$pgv_lang["view_records_in_place"]	= " Vis alle personer / familier knyttet til stedet ";
$pgv_lang["place_list2"] 		= "Alle stedsnavn";
$pgv_lang["show_place_hierarchy"]	= "Vis stedsnavn etter nivå";
$pgv_lang["show_place_list"]	= "Vis alle stedsnavn";
$pgv_lang["total_unic_places"]	= "Antall unike steder";

//-- MEDIALIST FILE MESSAGES
$pgv_lang["multi_title"]		= "Bilder eller andre medier";
$pgv_lang["media_found"]		= " bilder / medier funnet";
$pgv_lang["view_person"]		= "Vis person";
$pgv_lang["view_family"]		= "Vis familie";
$pgv_lang["view_source"]		= "Vis kilde";
$pgv_lang["prev"]				= "< Forrige";
$pgv_lang["next"]				= "Neste >";
$pgv_lang["file_not_found"]		= "Fant ikke filen.";
$pgv_lang["medialist_show"]		= "Vis ";
$pgv_lang["per_page"]			= " bilder / medier pr. side";

//-- SEARCH FILE MESSAGES
$pgv_lang["search_gedcom"]		= "Søke i slektsfilen";
$pgv_lang["enter_terms"]		= "Skriv inn søkeord";
$pgv_lang["soundex_search"]		= "- Eller søk slik du <i>tror</i> navnet er skrevet:";
$pgv_lang["sources"]			= "Kilder";
$pgv_lang["firstname_search"]	= "Fornavn";
$pgv_lang["lastname_search"]	= "Etternavn";
$pgv_lang["search_place"]		= "Stedsnavn";
$pgv_lang["search_year"]		= "År";
$pgv_lang["no_results"]			= "Fant ingen...";
$pgv_lang["invalid_search_input"] 	= "Vennligst angi fornavn, etternavn eller stedsnavn \\n\\t i tillegg til år";

//-- SOURCELIST FILE MESSAGES
$pgv_lang["sources_found"]		= " kilder funnet";
$pgv_lang["titles_found"]		= "Titler";
$pgv_lang["find_source"]		= "Finn kilde";

//-- REPOLIST FILE MESSAGES
$pgv_lang["repo_list"]				= "Oppbevaringssteder";
$pgv_lang["repos_found"]			= " oppbevaringssteder funnet";
$pgv_lang["find_repository"]		= "Finn oppbevaringssted";
$pgv_lang["total_repositories"]		= "Antall oppbevaringssteder";
$pgv_lang["repo_info"]				= "Informasjon om oppbevaringssted";
$pgv_lang["delete_repo"]			= "Slett oppbevaringssted";
$pgv_lang["other_repo_records"]		= "Kilder som er knyttet til dette oppbevaringsstedet:";
$pgv_lang["create_repository"]		= "Opprett nytt oppbevaringssted";
$pgv_lang["new_repo_created"]		= "Nytt oppbevaringssted er opprettet";
$pgv_lang["paste_rid_into_field"]	= "Lim inn følgende ID for oppbevaringsstedet til aktuelle koblings-feltet for ulike kilder: ";
$pgv_lang["confirm_delete_repo"]	= "Er du sikker på at du vil slette dette oppbevaringsstedet fra slektsbasen?";

//-- SOURCE FILE MESSAGES
$pgv_lang["source_info"]		= "Informasjon om kilde";
$pgv_lang["other_records"]		= "Navn som er knyttet til denne kilden:";
$pgv_lang["people"]				= "Personer";
$pgv_lang["families"]			= "Familier";
$pgv_lang["total_sources"]		= "Antall kilder";

//-- BUILDINDEX FILE MESSAGES
$pgv_lang["building_indi"]		= "Lager person- og familie-indeks";
$pgv_lang["building_index"]		= "Lager indekslister";
$pgv_lang["invalid_gedformat"]	= "Ugyldig GEDCOM 5.5 format";
$pgv_lang["importing_records"]	= "Importerer poster til databasen";
$pgv_lang["detected_change"]	= "PhpGedView har oppdaget en endring i GEDCOM-filen #GEDCOM#. Indeks filer må bygges opp igjen før du kan fortsette.";
$pgv_lang["please_be_patient"]	= "Vennligst VENT...";
$pgv_lang["reading_file"]		= "Leser GEDCOM-filen";
$pgv_lang["flushing"]			= "Henter ut data";
$pgv_lang["found_record"]		= "Poster funnet";
$pgv_lang["exec_time"]			= "Utføringstid:";
$pgv_lang["time_limit"]			= "Tidsgrense:";
$pgv_lang["unable_to_create_index"]	= "<b>Indeksfil kan ikke opprettes.</b><br />Sørg for nødvendige skrive-tillatelser i PhpGedView mappen (index).<br />Skrivebeskyttelsen kan evt. etableres igjen når indeksfilene er opprettet.";
$pgv_lang["indi_complete"]		= "Oppdatering av personindeksfilen er ferdig.";
$pgv_lang["family_complete"]	= "Oppdatering av familieindeksfilen er ferdig.";
$pgv_lang["source_complete"]	= "Oppdatering av kildeindeksfilen er ferdig.";
$pgv_lang["tables_exist"]		= "PhpGedView tabeller finnes allerede i databasen";
$pgv_lang["you_may"]			= "Du kan:";
$pgv_lang["drop_tables"]		= "Fjerne eksisterende tabeller";
$pgv_lang["import_multiple"]	= "Importere og arbeide med forskjellige GEDCOM-filer";
$pgv_lang["explain_options"]	= "Hvis du velger å fjerne tabellene, vil alle data bli hentet fra denne GEDCOM.<br />Hvis du velger å importere og arbeide med flere GEDCOM filer samtidig, vil PhpGedView slette alle data, som ble importert fra GEDCOMfil(er) med samme navn. Dette valget gjør det mulig å legge flere GEDCOM datasett i samme tabell og lett skifte mellom dem.";
$pgv_lang["path_to_gedcom"]		= "Angi stien til GEDCOM-filen din:";
$pgv_lang["dataset_exists"]		= "Det er allerede importert en GEDCOM-fil i databasen med navnet ";
$pgv_lang["changes_present"]	= "Denne slektsbasen har endringer på vent.  Dersom du fortsetter denne importen, vil disse endringene bli lagt til databasen uten at du at du får godkjent dem først.  Du BØR se gjennom endringene før du fortsetter importen!";
$pgv_lang["empty_dataset"]		= "Vil du tømme den nåværende slektsbasen og legge data inn på nytt?";
$pgv_lang["index_complete"]		= "Indeksering ferdig.";
$pgv_lang["click_here_to_go_to_pedigree_tree"] = "Klikk her for å gå til slektstreet.";
$pgv_lang["updating_is_dead"]	= "Oppdaterer statusen \"Er død\" for personer";
$pgv_lang["import_complete"]	= "Import ferdig";
$pgv_lang["updating_family_names"]	= "Oppdaterer familienavn for FAM";
$pgv_lang["processed_for"]		= "Behandlet fil for ";
$pgv_lang["run_tools"]			= "Vil du utføre en av disse valgene før filen blir importert:";
$pgv_lang["addmedia"]			= "Legg til bilder / medier";
$pgv_lang["dateconvert"]		= "Dato konverterings-rutine";
$pgv_lang["xreftorin"]			= "Konvertere XREF-IDer til RIN-nummer";
$pgv_lang["tools_readme"]		= "Se verktøy/rutine-delen i <a href=\"readme.txt\" target=\"_blank\">readme.txt</a>-filen for mer informasjon.";
$pgv_lang["sec"]				= "sek.";
$pgv_lang["bytes_read"]			= "Bytes lest:";
$pgv_lang["created_indis"]		= "Opprettet tabellen <i>Personer</i>.";
$pgv_lang["created_indis_fail"]	= "Klarte ikke å opprette tabellen <i>Personer</i>!";
$pgv_lang["created_fams"]		= "Opprettet tabellen <i>Familier</i>.";
$pgv_lang["created_fams_fail"]	= "Klarte ikke å opprette tabellen <i>Familier</i>!";
$pgv_lang["created_sources"]	= "Opprettet tabellen <i>Kilder</i>.";
$pgv_lang["created_sources_fail"]	= "Klarte ikke å opprette tabellen <i>Kilder</i>!";
$pgv_lang["created_other"]		= "Opprettet tabellen <i>Annet</i>.";
$pgv_lang["created_other_fail"]	= "Klarte ikke å opprette tabellen <i>Annet</i>!";
$pgv_lang["created_places"]		= "Opprettet tabellen <i>Steder</i>.";
$pgv_lang["created_places_fail"]	= "Klarte ikke å opprette tabellen <i>Steder</i>!";
$pgv_lang["import_progress"]	= "Import utført...";

//-- INDIVIDUAL AND FAMILYLIST FILE MESSAGES
$pgv_lang["total_fams"]			= "Antall familier";
$pgv_lang["total_indis"]		= "Antall personer";
$pgv_lang["starts_with"]		= "Starter med:";
$pgv_lang["person_list"]		= "Personliste:";
$pgv_lang["paste_person"]		= "Legg inn person";
$pgv_lang["notes_sources_media"]	= "Noter, kilder, og media";
$pgv_lang["notes"]				= "Noter";
$pgv_lang["ssourcess"]			= "Kilder";
$pgv_lang["media"]				= "Bilder / medier";
$pgv_lang["name_contains"]		= "Navn inneholder:";
$pgv_lang["filter"]				= "Søk";
$pgv_lang["find_individual"]	= "Finn person";
$pgv_lang["find_familyid"]		= "Finn familie";
$pgv_lang["find_sourceid"]		= "Finn kilde";
$pgv_lang["find_specialchar"]	= "Finn spesielle bokstaver";
$pgv_lang["magnify"]			= "Forstørr";
$pgv_lang["skip_surnames"]		= "Vis utvidet liste".(isset($alpha)?" (".$alpha.")":"");
$pgv_lang["show_surnames"]		= "Vis kun etternavn";
$pgv_lang["all"]				= "ALLE";
$pgv_lang["hidden"]				= "Skjulte";
$pgv_lang["confidential"]		= "Fortrolig";

//-- TIMELINE FILE MESSAGES
$pgv_lang["age"]				= "Alder";
$pgv_lang["timeline_title"]		= "PhpGedView tidslinje";
$pgv_lang["timeline_chart"]		= "Tidslinje";
$pgv_lang["remove_person"]		= "Fjern person";
$pgv_lang["show_age"]			= "Vis markør for alder";
$pgv_lang["add_another"]		= "Legg til en person på tidslinjen:<br />Person ID:";
$pgv_lang["find_id"]			= "Finn ID";
$pgv_lang["show"]				= "Vis";
$pgv_lang["year"]				= "År";
$pgv_lang["timeline_instructions"]	= "- <i><b>PS!</b>  Du kan flytte på boksene under ved hjelp av musa!</i> (I de nyeste nettleserne)";
$pgv_lang["zoom_out"]			= "Zoom ut";
$pgv_lang["zoom_in"]			= "Zoom inn";

//-- MONTH NAMES
$pgv_lang["jan"]				= "januar";
$pgv_lang["feb"]				= "februar";
$pgv_lang["mar"]				= "mars";
$pgv_lang["apr"]				= "april";
$pgv_lang["may"]				= "mai";
$pgv_lang["jun"]				= "juni";
$pgv_lang["jul"]				= "juli";
$pgv_lang["aug"]				= "august";
$pgv_lang["sep"]				= "september";
$pgv_lang["oct"]				= "oktober";
$pgv_lang["nov"]				= "november";
$pgv_lang["dec"]				= "desember";
$pgv_lang["abt"]				= "omkring";
$pgv_lang["aft"]				= "etter";
$pgv_lang["and"]				= "og";
$pgv_lang["bef"]				= "før";
$pgv_lang["bet"]				= "mellom";
$pgv_lang["cal"]				= "beregnet";
$pgv_lang["est"]				= "anslått";
$pgv_lang["from"]				= "fra";
$pgv_lang["int"]				= "tolket";
$pgv_lang["to"]					= "til";
$pgv_lang["cir"]				= "cirka";
$pgv_lang["apx"]				= "ca";

//-- Admin File Messages
$pgv_lang["select_an_option"]		= "Alternativer:";
$pgv_lang["readme_documentation"]	= "ReadMe-dokumentasjon (Engelsk)";
$pgv_lang["configuration"]			= "Program-innstillinger";
$pgv_lang["rebuild_indexes"]		= "Lag indeksene på nytt";
$pgv_lang["user_admin"]				= "Brukere og rettigheter";
$pgv_lang["user_created"]			= "Bruker er opprettet.";
$pgv_lang["user_create_error"]		= "Bruker kan ikke opprettes. Gå tilbake og prøv på nytt.";
$pgv_lang["password_mismatch"]		= "De to passordene er forskjellige.";
$pgv_lang["enter_username"]			= "Du må oppgi et brukernavn.";
$pgv_lang["enter_fullname"]			= "Du må oppgi et fullt navn.";
$pgv_lang["enter_password"]			= "Du må oppgi et passord.";
$pgv_lang["confirm_password"]		= "Du må bekrefte passordet.";
$pgv_lang["update_user"]			= "Oppdater brukerkonto";
$pgv_lang["update_myaccount"]		= "Oppdater Min konto";
$pgv_lang["save"]					= "Lagre";
$pgv_lang["delete"]					= "Slett";
$pgv_lang["edit"]					= "Endre";
$pgv_lang["full_name"]				= "Fullt navn";
$pgv_lang["visibleonline"]			= "Vis brukere som er pålogget";
$pgv_lang["editaccount"]			= "Gi denne brukeren rettighet til å endre brukerkontoen sin";
$pgv_lang["admin_gedcom"]			= "Administrere";
$pgv_lang["confirm_user_delete"]	= "Er du sikker på at du vil slette brukeren";
$pgv_lang["create_user"]			= "Opprett bruker";
$pgv_lang["no_login"]				= "Bruker kan ikke godkjennes.";
$pgv_lang["import_gedcom"]			= "Importer en GEDCOM-fil";
$pgv_lang["duplicate_username"]		= "NB!! Det finnes allerede et slikt brukernavn. Gå tilbake og velg et annet brukernavn.";
$pgv_lang["gedcomid"]				= "Bruker ID<br />i slektsbasen";
$pgv_lang["enter_gedcomid"]			= "Du må oppgi en ID.";
$pgv_lang["user_info"]				= "Min brukerinformasjon";
$pgv_lang["rootid"]					= "ID til startperson<br />i slektsbasen";
$pgv_lang["download_gedcom"]		= "Laste ned (download) GEDCOM";
$pgv_lang["upload_gedcom"]			= "Hente (upload) GEDCOM-fil(er)";
$pgv_lang["add_new_gedcom"]			= "Lag en ny GEDCOM-fil";
$pgv_lang["gedcom_file"]			= "GEDCOM-fil:";
$pgv_lang["enter_filename"]			= "Du må oppgi et GEDCOM filnavn.";
$pgv_lang["file_not_exists"]		= "Oppgitt filnavn finnes ikke!";
$pgv_lang["file_exists"]			= "Det finnes allerede en GEDCOM-fil med dette navnet. Velg et annet navn, eller slett den gamle filen.";
$pgv_lang["new_gedcom_title"]		= "Slektsbase fra [#GEDCOMFILE#]";
$pgv_lang["upload_error"]			= "Det oppstod en FEIL under henting (upload) av filen din.";
$pgv_lang["upload_help"]			= "Velg en fil fra din lokale PC for å sende (upload) til serveren din. Filen(e) vil erstatte de(n) nåværende filen(e) og bli lagret i katalogen: ";
$pgv_lang["add_gedcom_instructions"]	= "Tast inn et filnavn for denne nye GEDCOM-filen. Den blir opprettet i index-mappen:";
$pgv_lang["file_success"]			= "Filen er lastet opp";
$pgv_lang["file_too_big"]			= "Opplastet fil overskrider tillatt størrelse";
$pgv_lang["file_partial"]			= "Filen ble bare delvis lastet opp, forsøk på nytt";
$pgv_lang["file_missing"]			= "Det ble ikke mottatt noen fil. Hent filen på nytt.";
$pgv_lang["manage_gedcoms"]			= "Slektsfil(er) og personvern";
$pgv_lang["research_log"]			= "Forsknings-logg";
$pgv_lang["administration"]			= "Administrasjon";
$pgv_lang["ansi_to_utf8"]			= "Konvertere denne ANSI-kodede GEDCOM-filen til UTF-8?";
$pgv_lang["utf8_to_ansi"]			= "Ønsker du å konvertere fra UTF-8 til ANSI (ISO-8859-1)?";
$pgv_lang["user_manual"]			= "Brukerdokumentasjon";
$pgv_lang["upgrade"]				= "Oppgrader PhpGedView";
$pgv_lang["view_logs"]				= "Vis logg-fil ";
$pgv_lang["logfile_content"]		= "Innhold i logg-filen";
$pgv_lang["step1"]					= "Del 1 av 4:";
$pgv_lang["step2"]					= "Del 2 av 4:";
$pgv_lang["step3"]					= "Del 3 av 4:";
$pgv_lang["step4"]					= "Del 4 av 4:";
$pgv_lang["validate_gedcom"]		= "Sjekker kvaliteten til GEDCOM-filen";
$pgv_lang["img_admin_settings"]		= "Endre innstillingene for bilde-behandling";
$pgv_lang["download_note"]			= "NB! Store GEDCOM-filer kan ta lang tid å forberede før en nedlastning (download).  Dersom PHP melder at tiden har gått ut før nedlastningen er ferdig, så kan det være at du ikke har mottatt hele filen.  For å sjekke om den nedlastede GEDCOM-filen er korrekt, kan se om filen inneholder linjen <b>0 TRLR</b> på slutten.  Som en tommelfinger-regel vil tiden det tar å laste ned GEDCOM-filen, være like lang som det tok å importere den (avhengig av hastigheten på internett-tilkoblingen din).";
$pgv_lang["pgv_registry"]			= "Vis andre nettsteder som bruker PhpGedView";
$pgv_lang["verify_upload_instructions"]	= "Dersom du velger å fortsette, vil den eksisterende GEDCOM-filen bli erstattet med den filen som du har valgt å laste opp. Den nye filen vil deretter bli importert inn i PhpGedView.<br />Velger du å avbryte, vil den eksisterende GEDCOM-filen forbli uforandret.";
$pgv_lang["cancel_upload"]			= "Avbryt opplastingen (upload)";
$pgv_lang["add_media_records"]		= "Legg til Media-poster";
$pgv_lang["manage_media_files"]		= "Behandle Media-filer";
$pgv_lang["link_media_records"]		= "Knytt media-objekt til personer";
$pgv_lang["add_media_button"]		= "Legg til Media";
$pgv_lang["phpinfo"]				= "PHPInfo";
$pgv_lang["admin_info"]				= "Informasjon";
$pgv_lang["admin_geds"]				= "Data og GEDCOM-administrasjon";
$pgv_lang["admin_site"]				= "Administrasjon av nettstedet";

//-- Relationship chart messages
$pgv_lang["relationship_chart"]	= "Slektskap";
$pgv_lang["person1"]			= "Person 1 ";
$pgv_lang["person2"]			= "Person 2 ";
$pgv_lang["no_link_found"]		= "- Kan ikke finne flere (andre) familiebånd mellom de to personene!";
$pgv_lang["sibling"]			= "Søsken";
$pgv_lang["follow_spouse"]		= "Finn familiebånd via giftemål";
$pgv_lang["timeout_error"]		= "FEIL: Fant ikke noen familiebånd innenfor fastsatt søketid.";
$pgv_lang["son"]				= "Sønn";
$pgv_lang["daughter"]			= "Datter";
$pgv_lang["brother"]			= "Bror";
$pgv_lang["sister"]				= "Søster";
$pgv_lang["relationship_to_me"]	= "Slektskap til deg";
$pgv_lang["rela_husb"]			= "Slektskap til ektemann";
$pgv_lang["rela_wife"]			= "Slektskap til hustru";
$pgv_lang["next_path"]			= "Finn neste sti";
$pgv_lang["show_path"]			= "Vis sti";
$pgv_lang["line_up_generations"]	= "Vis like slektsledd på linje";
$pgv_lang["oldest_top"]			= "Vis de eldste øverst";

//-- GEDCOM edit utility
$pgv_lang["check_delete"]		= "Er du sikker på at du vil slette disse slektsdataene?";
$pgv_lang["access_denied"]		= "<h3><b>Ingen adgang!</b></h3><br />Du har ikke tilgang til denne delen.";
$pgv_lang["gedrec_deleted"]		= "GEDCOM post er nå slettet.";
$pgv_lang["gedcom_deleted"]		= "GEDCOM [#GED#] er nå slettet.";
$pgv_lang["changes_exist"]		= "Det er gjort endringer i denne slektsbasen.";
$pgv_lang["accept_changes"]		= "Godta / Avvis endring(ene)";
$pgv_lang["show_changes"]		= "Denne posten er blitt oppdatert. Klikk her for å se endring(ene).";
$pgv_lang["hide_changes"]		= "Klikk her for å skjule endringer.";
$pgv_lang["review_changes"]		= "Vis endring(ene) i slektsbasen en gang til";
$pgv_lang["undo_successful"]	= "Angring er utført";
$pgv_lang["undo"]				= "Angre";
$pgv_lang["view_change_diff"]	= "Vis endring(er), forskjell(er)";
$pgv_lang["changes_occurred"]	= "Følgende endring(er) er gjort for denne personen:";
$pgv_lang["find_place"]			= "Finn stedsnavn";
$pgv_lang["close_window"]		= "Lukk vinduet";
$pgv_lang["close_window_without_refresh"]	= "Lukk vinduet uten å oppdatere skjermen";
$pgv_lang["place_contains"]		= "Stedsnavn inneholder:";
$pgv_lang["accept_gedcom"]		= "Bestem deg for om du vil godkjenne eller avvise de enkelte endringene.<dl><dt>For å godta <i>alle</i> endringene på en gang</dt><dd>Klikk på linken \"Godkjenn alle endringer\" i boksen under.</dd><dt>For å få mer informasjon om en endring kan du klikke på:</dt><dd><li>\"$pgv_lang[view_change_diff]\" for å se på forskjellen mellom gammelt og nytt innhold.<br /><li>\"$pgv_lang[view_gedcom]\" for å se på det nye innholdet i GEDCOM format.</dd></dl>";
$pgv_lang["ged_import"]			= "Importer";
$pgv_lang["now_import"]			= "Nå bør du importere innholdet i slektsfilen til PhpGedView ved å klikke på linken \"Importer\" nedenfor.";
$pgv_lang["add_fact"]			= "Legg til nye fakta";
$pgv_lang["add"]				= "Legg til";
$pgv_lang["custom_event"]		= "Egendef. hendelse";
$pgv_lang["update_successful"]	= "Oppdatering er utført";
$pgv_lang["add_child"]			= "Legg til barn";
$pgv_lang["add_child_to_family"]	= "Legg til et barn til denne familien";
$pgv_lang["add_sibling"]		= "Legg til en bror eller søster";
$pgv_lang["add_son_daughter"]	= "Legg til en sønn eller datter";
$pgv_lang["must_provide"]		= "Du må sørge for et ";
$pgv_lang["delete_person"]		= "Slett denne person";
$pgv_lang["confirm_delete_person"]	= "Er du sikker på at du vil slette denne personen fra slektsbasen?";
$pgv_lang["find_media"]			= "Finn media";
$pgv_lang["set_link"]			= "Lag kobling";
$pgv_lang["add_source_lbl"]		= "Legg til kildehenvisning";
$pgv_lang["add_source"]			= "Legg til en ny kildehenvisning";
$pgv_lang["add_note_lbl"]		= "Legg til note";
$pgv_lang["add_note"]			= "Legg til en ny note";
$pgv_lang["add_media_lbl"]		= "Legg til bilder/andre medier";
$pgv_lang["add_media"]			= "Legg til en ny bilde- / mediefil";
$pgv_lang["delete_source"]		= "Slett denne kilden";
$pgv_lang["confirm_delete_source"]	= "Er du sikker på at du vil slette denne kilden fra slektsbasen?";
$pgv_lang["add_husb"]			= "Legg til ektemann";
$pgv_lang["add_husb_to_family"]	= "Legg til en ektemann/far til denne familien";
$pgv_lang["add_wife"]			= "Legg til hustru";
$pgv_lang["add_wife_to_family"]	= "Legg til en hustru/mor til denne familien";
$pgv_lang["find_family"]		= "Finn familie";
$pgv_lang["find_fam_list"]		= "Finn Familieliste";
$pgv_lang["add_new_wife"]		= "Legg til en ny hustru";
$pgv_lang["add_new_husb"]		= "Legg til en ny ektemann";
$pgv_lang["edit_name"]			= "Rediger navn";
$pgv_lang["delete_name"]		= "Slett navn";
$pgv_lang["no_temple"]			= "Ingen Tempel-Living tilordning";
$pgv_lang["replace"]			= "Erstatt Post";
$pgv_lang["append"]				= "Legg til Post";
$pgv_lang["add_father"]			= "Legg til en ny far";
$pgv_lang["add_mother"]			= "Legg til en ny mor";
$pgv_lang["add_obje"]			= "Legg til et nytt bilde / media";
$pgv_lang["no_changes"]			= "Det er ikke noen endringer som det er nødvendig å vise på nytt.";
$pgv_lang["accept"]				= "Godkjenne";
$pgv_lang["accept_all"]			= "Godkjenn alle endringer";
$pgv_lang["accept_successful"]	= "Godkjente endringer er lagt til databasen";
$pgv_lang["edit_raw"]			= "Endre opplysninger direkte i GEDCOM-filen";
$pgv_lang["select_date"]		= "Velg en dato";
$pgv_lang["create_source"]		= "Opprett en ny kilde";
$pgv_lang["new_source_created"]	= "Den nye kilden er lagret!";
$pgv_lang["paste_id_into_field"]= "Legg inn følgende kilde-ID inn i endringsfeltet som en referanse til denne kilden ";
$pgv_lang["add_name"]			= "Legg til nytt navn";
$pgv_lang["privacy_not_granted"]	= "Du har ikke tilgang til";
$pgv_lang["user_cannot_edit"]		= "Dette brukernavnet har ikke rettigheter til å endre denne slektsbase (GEDCOM).";
$pgv_lang["gedcom_editing_disabled"]	= "Muligheten til å endre denne slektsbase (GEDCOM) er blit deaktivert av system-administratoren.";
$pgv_lang["privacy_prevented_editing"]	= "På grunn av hensyn til personvern, kan du ikke endre opplysningene.";
$pgv_lang["add_asso"]			= "Legg til en ny tilknyttet person";

//-- calendar.php messages
$pgv_lang["on_this_day"]		= "Årsdag for hendelser i slekten...";
$pgv_lang["in_this_month"]		= "Årsdager for hendelser i slekten...";
$pgv_lang["in_this_year"]		= "Hendelser i slekten...";
$pgv_lang["year_anniversary"]	= "#year_var#. årsdag";
$pgv_lang["today"]				= "I dag";
$pgv_lang["day"]				= "Dag";
$pgv_lang["month"]				= "Måned";
$pgv_lang["showcal"]			= "Vis hendelser for";
$pgv_lang["anniversary_calendar"] = "Historisk kalender";
$pgv_lang["monday"]				= "mandag";
$pgv_lang["tuesday"]			= "tirsdag";
$pgv_lang["wednesday"]			= "onsdag";
$pgv_lang["thursday"]			= "torsdag";
$pgv_lang["friday"]				= "fredag";
$pgv_lang["saturday"]			= "lørdag";
$pgv_lang["sunday"]				= "søndag";
$pgv_lang["viewday"]			= "Vis dag";
$pgv_lang["viewmonth"]			= "Vis måned";
$pgv_lang["viewyear"]			= "Vis år";
$pgv_lang["all_people"]			= "Alle personer";
$pgv_lang["living_only"]		= "Nålevende personer";
$pgv_lang["recent_events"]		= "De siste 100 årene";
$pgv_lang["day_not_set"]		= "Dag ikke angitt";
$pgv_lang["year_error"]			= "Beklager, datoer før 1970 støttes ikke.";

//-- upload media messages
$pgv_lang["upload_media"]		= "Hente (upload) bilde- / mediefiler";
$pgv_lang["media_file"]			= "Medie-fil";
$pgv_lang["thumbnail"]			= "Passfoto";
$pgv_lang["upload_successful"]	= "Overføring (upload) er utført";

//-- user self registration module
$pgv_lang["lost_password"]		= "Glemt passordet ditt?";
$pgv_lang["requestpassword"]	= "Be om nytt passord";
$pgv_lang["no_account_yet"]		= "Har du ikke <b>egen</b> konto enda!?";
$pgv_lang["requestaccount"]		= "Søke om brukerkonto";
$pgv_lang["register_info_01"]	= "Opplysninger som kan vise offentlig på dette nettstedet, kan være begrenset i henhold til lov om personvern.<br />Mange personer vil heller ikke at deres personlige data ligger åpent på internett.<br />Disse kan bli misbrukt til spam eller av identitetstyver.<br /><br />For å få tilgang på private data på dette nettstedet, må du ha en brukerkonto.<br />Det kan du få ved å registere deg ved hjelp av skjemaet under.<br />Dersom kontoen din blir godkjent, vil du kunne logge deg inn og se private data.<br /><br />Dersom personvern er aktivert, vil du etter å ha logget deg inn, bare få tilgang til private opplysninger til de nærmeste slektningene dine.<br />Administrator kan også gi deg tilgang til å gjøre endringer eller legge til informasjon i slektsbasen.<br /><br />NB: Du vil også kunne få tilgang til de private dataene dersom du kan bevise at du er nær slektning til en i databasen.<br /><br />Dersom du ikke har nære slektninger i slektsbasen, vil du nok ikke få tilgang ...<br />Hvis du trenger mer opplysninger, kan du bruke linken under til å kontakte ansvarlig for nettstedet.<br /><br />";
$pgv_lang["pls_note01"]			= "NB: Systemet skiller mellom store og små bokstaver!";
$pgv_lang["min6chars"]			= "Passord må inneholde minst 6 tegn";
$pgv_lang["pls_note02"]			= "NB: Passordet kan inneholde bokstaver, tall og andre tegn.<br />(- Men du bør helst <b>ikke</b> bruke tegnene <b>\"</b> eller <b>'</b> )";
$pgv_lang["pls_note03"]			= "Denne epost-adressen sjekkes før en konto aktiveres.<br />PS. Epost-adressen vil ikke vises på denne siden senere.<br />Du vil så motta en epost til denne adressen, med de opplysningene du har oppgitt og litt informasjon.";
$pgv_lang["emailadress"]		= "Epost-adresse";
$pgv_lang["pls_note04"]			= "Felt er som er markert med * må fylles ut.";
$pgv_lang["pls_note05"]			= "Etter at skjemaet på denne siden er sendt og svarene dine sjekket,<br />vil du få tilsendt en bekreftelse til den epost-adressen du har oppgitt over.<br />Ved hjelp av denne e-posten kan du aktivere kontoen din.<br />Dersom du ikke aktiverer kontoen innen 7 dager, vil kontoen bli slettet (da vil du kunne opprette kontoen på nytt igjen).<br />Du må oppgi en gyldig epost-adresse for å kunne motta bekreftelsen på kontoen.<br /><br />Hvis du får problemer i forbindelse med å opprette en konto her, så kontakt systemansvarlig.";

$pgv_lang["mail01_line01"]		= "Hei #user_fullname# ...";
$pgv_lang["mail01_line02"]		= "En anmodning er gjort på ( #SERVER_NAME# ) om å få en brukerkonto med din epost-adresse ( #user_email# ).";
$pgv_lang["mail01_line03"]		= "Opplysningene om deg ble gitt ved forespørsel om brukerkonto.";
$pgv_lang["mail01_line04"]		= "Vennligst klikk på linken under og fyll ut riktige data for å bekrefte kontoen og epost-adressen din.";
$pgv_lang["mail01_line05"]		= "Dersom du ikke har bedt om å få en konto, kan du bare slette denne e-posten.";
$pgv_lang["mail01_line06"]		= "Du vil ikke få tilsendt flere e-poster herfra, fordi kontoen vil bli slettet etter 7 dager dersom den ikke bekreftes.";

$pgv_lang["mail01_subject"]		= "Din registrering hos #SERVER_NAME#";

$pgv_lang["mail02_line01"]		= "Hei administrator ...";
$pgv_lang["mail02_line02"]		= "En ny bruker har registreret seg hos ( #SERVER_NAME# ).";
$pgv_lang["mail02_line03"]		= "Brukeren har fått tilsendt en e-post med de nødvendige data for å bekrefte ønske om konto.";
$pgv_lang["mail02_line04"]		= "Så snart brukeren har bekreftet kontoen, vil du få en epost der du blir bedt om å gi denne brukeren tillatelse til å få en konto.";
$pgv_lang["mail02_line04a"]		= "Så snart brukeren har bekreftet kontoen, vil du få en epost om dette.  Brukeren vil nå kunne logge seg inn uten at du trenger å gjøre noe.";
$pgv_lang["mail02_subject"]		= "Ny registrering på #SERVER_NAME#";

$pgv_lang["hashcode"]			= "Kontrollkode:";
$pgv_lang["thankyou"]			= "Hei #user_fullname# og takk for søknaden din om å få en brukerkonto.";
$pgv_lang["pls_note06"]			= "Du vil nå få tilsendt en bekreftelses-epost til adressen ( #user_email# ).<br />Ved hjelp av denne e-posten kan du aktivere kontoen din. Dersom du ikke aktiverer kontoen din innen 7 dager, vil den bli slettet (du kan registrere kontoen igjen etter de 7 dagene, om du ønsker det). For å logge deg inn på dette nettstedet, kreves det at du oppgir et brukernavn og passord.<br /><br /><br /><br />";
$pgv_lang["pls_note06a"] 		= "Vi vil nå sende en bekreftelse på e-post til adressen ( #user_email# ). Du må bekrefte ønske ditt om å få en konto ved å følge instruksene i i e-posten. Dersom du ikke bekrefter ønsket om å få en konto innen 7 dager, vil ønsket om en konto bli avslått automatisk.  Dersom senere ønsker å få en ny konto, må du søke på nytt.<br /><br />Etter at du har fulgt instruksjonene i bekreftelses-e-posten, kan du logge deg inn.  For å logge deg inn på denne nettsiden, kreves det at du oppgir brukernavnrt og passordet ditt.<br /><br />";

$pgv_lang["registernew"]		= "Bekreftelse av ny konto";
$pgv_lang["user_verify"]		= "Bruker-godkjenning";
$pgv_lang["send"]				= "Send";

$pgv_lang["pls_note07"]			= "Oppgi det brukernavnet, passordet og kontrollkoden du fikk tilsendt pr. epost fra dette nettstedet som en bekreftelse på søknaden din.";
$pgv_lang["pls_note08"]			= "Informasjonen om brukeren <b>#user_name#</b> er sjekket.";

$pgv_lang["mail03_line01"]		= "Hei administrator ...";
$pgv_lang["mail03_line02"]		= "#newuser[username]# ( #newuser[fullname]# ) har bekreftet ønsket om å få en brukerkonto.";
$pgv_lang["mail03_line03"]		= "Klikk på linken \"Admin\" på siden \"Logg inn\" på PhpGedView for å godkjenne den nye brukeren på nettstedet ditt.";
$pgv_lang["mail03_line03a"]		= "Du behøver ikke forta deg noe; brukeren kan nå logge seg inn.";
$pgv_lang["mail03_subject"]		= "Ny bekreftelse fra #SERVER_NAME#";

$pgv_lang["pls_note09"]			= "Du er gjenkjent som en søker på dette nettstedet.";
$pgv_lang["pls_note10"]			= "Administratoren til nettstedet har fått beskjed om søknaden.<br />Så snart vedkommende har godkjent kontoen din,<br />kan du logge deg inn med ditt brukernavn og passord.";
$pgv_lang["pls_note10a"]		= "Du kan nå logge deg inn med brukernavnet og passordet ditt.";
$pgv_lang["data_incorrect"]		= "Data var ugyldig!<br />- Prøv igjen!";
$pgv_lang["user_not_found"]		= "Kunne ikke gjenkjenne opplysningene du oppga! Gå tilbake og prøv igjen.";

$pgv_lang["lost_pw_reset"]		= "Nytt passord";

$pgv_lang["pls_note11"]			= "For å få et nytt passord, må du oppgi brukernavnet og epost-adressen til brukerkontoen din. <br /><br />Vi vil deretter sende deg en epost med en spesiell internettadresse, som inneholder en bekreftelses-kode for kontoen din.<br />På denne internettsiden vil du kunne endre passordet for å få tilgang til brukersiden din igjen.<br />Av sikkerhetsgrunner, bør du ikke vise denne bekreftelses-koden til noen, inkludert administrator(ene) til denne siden (vi vil heller ikke spørre etter den).<br /><br />Dersom du ønsker å få mer hjelp vedrørende dette, så kontakt administrator.";
$pgv_lang["enter_email"]		= "Du må oppgi en epost-adresse.";

$pgv_lang["mail04_line01"]		= "Hei #user_fullname# ...";
$pgv_lang["mail04_line02"]		= "Det ble bestilt et nytt passord til brukernavnet ditt!";
$pgv_lang["mail04_line03"]		= "Anbefaling:";
$pgv_lang["mail04_line04"]		= "Vennligst klikk på linken under. Logg deg inn med det nye passordet. Du bør så angi et nytt passord for å verne om sikkerheten til dataene dine.";

$pgv_lang["mail04_subject"]		= "Data anmodning fra #SERVER_NAME#";

$pgv_lang["pwreqinfo"]			= "Hei...<br /><br />En epost med det nye passordet ble sendt til epost-adressen (#user[email]#).<br /><br />Vær vennlig å sjekk epost-kontoen din om noen minutter.<br /><br />Anbefaling:<br /><br />Etter at du har mottatt eposten, bør du logge deg inn på dette nettstedet med ditt nye passord og endre det. Dette bør gjøres for å verne om sikkerheten til dataene din.";

$pgv_lang["editowndata"]		= "Min konto";
$pgv_lang["savedata"]			= "Lagre endrede data";
$pgv_lang["datachanged"]		= "Brukerdata er endret!";
$pgv_lang["datachanged_name"]	= "Du må kanskje logge deg inn på nytt med det nye brukernavnet ditt.";
$pgv_lang["myuserdata"]			= "Min konto";
$pgv_lang["verified"]			= "Bruker har<br />bekreftet søknaden";
$pgv_lang["verified_by_admin"]	= "Godkjent bruker<br />[av Admin]";
$pgv_lang["user_theme"]			= "Min stil";
$pgv_lang["mgv"]				= "Min side";
$pgv_lang["mygedview"]			= "Min GedView";
$pgv_lang["passwordlength"]		= "Passordet må inneholde minst 6 tegn.";
$pgv_lang["admin_approved"]		= "Din konto hos #SERVER_NAME# er blitt godkjent";
$pgv_lang["you_may_login"]		= " av administratoren til nettstedet.<br />Du kan nå logge deg inn på nettstedet ved å klikke på linken under:";
$pgv_lang["welcome_text_auth_mode_1"]	= "<center><h3><b>Velkommen til disse slektssidene !</b></h3>PS! - <i>Sidene er tilgjengelig for <b>alle</b> besøkende som har en brukerkonto.</i><br />Har du en brukerkonto, kan du logge deg inn under.<br /><br />Dersom du ikke har en brukerkonto enda, kan du søke om å få en<br />ved å klikke på linken \"Søke om brukerkonto\".<br />Etter å ha sjekket informasjonen i søknaden, vil administratoren til nettstedet aktivere kontoen din.<br />Du vil motta en e-post når den er godkjent.</center>";
$pgv_lang["welcome_text_auth_mode_2"]	= "<center><h3><b>Velkommen til disse slektssidene !</b></h3>PS! - <i>Sidene er <b>bare</b> tilgjengelig for <b>registrerte</b> brukere!</i><br />Har du en brukerkonto, kan du logge deg inn under.<br /><br />Dersom du ikke har en konto enda, kan søke om å få opprettet en konto<br />ved å klikke på linken \"Søke om brukerkonto\".<br />Etter å ha sjekket informasjonen i søknaden din,<br />kan administratoren til nettstedet enten godkjenne eller avslå den.<br />Du vil motta en e-post med beskjed dersom søknaden din blir akseptert.</center>";
$pgv_lang["welcome_text_auth_mode_3"]	= "<center><h3><b>Velkommen til disse slektssidene !</b></h3>PS! - <i>Sidene er <b>bare</b> tilgjengelig for <b>medlemmer av familien</b>.</i><br />Har du en brukerkonto, kan du logge deg inn under.<br /><br />Dersom du ikke har en konto enda, kan søke om å få opprettet en konto<br />ved å klikke på linken \"Søke om brukerkonto\".<br />Etter å ha sjekket informasjonen i søknaden din,<br />kan administratoren til nettstedet enten godkjenne eller avslå den.<br />Du vil motta en e-post dersom den blir godkjent.</center>";
$pgv_lang["welcome_text_cust_head"]		= "<center><h3><b>Velkommen til disse slektssidene !</b></h3>PS! - <i>Sidene er <b>bare</b> tilgjengelig for brukere som har <b>gyldig</b> brukernavn og passord.</i></center><br />";

//-- mygedview page
$pgv_lang["welcome"]			= "Velkommen";
$pgv_lang["upcoming_events"]	= "Kommende begivenheter";
$pgv_lang["chat"]				= "Chat";
$pgv_lang["users_logged_in"]	= "Brukere som er logget inn";
$pgv_lang["message"]			= "Ny beskjed til ";
$pgv_lang["my_messages"]		= "Mine beskjeder";
$pgv_lang["date_created"]		= "Dato sendt:";
$pgv_lang["message_from"]		= "Epost-adresse:";
$pgv_lang["message_from_name"]	= "Ditt navn:";
$pgv_lang["message_to"]			= "Beskjed til:";
$pgv_lang["message_subject"]	= "Emne:";
$pgv_lang["message_body"]		= "Din beskjed:";
$pgv_lang["no_to_user"]			= "Det ble ikke oppgitt en annen bruker som mottaker. - Kan ikke fortsette.";
$pgv_lang["provide_email"]		= "Vennligst oppgi epost-adressen din, så vi kan besvare denne henvendelse.<br />Dersom du ikke oppgir epost-adressen din, har vi ikke mulig til å besvare denne forespørselen.<br />PS. Epost-adressen din vil ikke bli brukt til annet enn å besvare denne forespørselen.";
$pgv_lang["reply"]				= "Svar";
$pgv_lang["message_deleted"]	= "Beskjed slettet";
$pgv_lang["message_sent"]		= "Beskjed sendt";
$pgv_lang["reset"]				= "Vanlig størrelse / oppsett";
$pgv_lang["site_default"]		= "Standard på siden";
$pgv_lang["mygedview_desc"]		= "Dette er <i>din side</i> der du kan velge egne <i>favoritter</i>, bli påminnet om <i>kommende begivenheter</i> og <i>samarbeide med andre brukere</i>.";
$pgv_lang["no_messages"]		= "Det er ingen beskjeder til deg.";
$pgv_lang["clicking_ok"]		= "Ved å klikke på OK, åpnes det et nytt vindu, der du kan kontakte #user[fullname]#";
$pgv_lang["my_favorites"]		= "Mine favoritter";
$pgv_lang["no_favorites"]		= "<i>Du har ikke valgt noen favoritter enda!</i><br />For å legge til en person til dine favoritter, kan du enten finne siden med fakta om personen og så klikke på linken <br />\"Legg til i Mine favoritter\" eller bruk ID-feltet under for å legge til en person ved hjelp av personens ID-nummer.";
$pgv_lang["add_to_my_favorites"] = "Legg til i Mine favoritter";
$pgv_lang["gedcom_favorites"]	 = "Favoritter i denne slektsbasen";
$pgv_lang["no_gedcom_favorites"] = "Det er ikke valgt noen Favoritter enda.  Det er administrator som kan legge til personer her, slik at disse vises ved oppstart.";
$pgv_lang["confirm_fav_remove"]	= "Er du sikker på at du vil fjerne denne personen fra favorittene dine?";
$pgv_lang["invalid_email"]		= "Tast inn en gyldig epost-adresse.";
$pgv_lang["enter_subject"]		= "Tast inn en tekst i feltet for emne.";
$pgv_lang["enter_body"]			= "Skriv inn en beskjed / tekst før den sendes.";
$pgv_lang["confirm_message_delete"]	= "Er du sikker på du vil slette denne beskjeden? Når den er slettet, kan den ikke hentes tilbake igjen.";

$pgv_lang["message_email1"]		= "Følgende beskjed ble sendt til kontoen din i PhpGedView fra ";
$pgv_lang["message_email2"]		= "Du sendte følgende beskjed til en bruker av PhpGedView:";
$pgv_lang["message_email3"]		= "Du sendte følgende beskjed til administratoren av PhpGedView:";
$pgv_lang["viewing_url"]		= "Denne beskjed ble sendt da du var på følgende url: ";
$pgv_lang["messaging2_help"]	= "Når du sender denne beskjeden, vil du også motta en kopi til den epost-adressen din som du har oppgitt.";
$pgv_lang["random_picture"]		= "Tilfeldig utvalgt bilde / medie";
$pgv_lang["message_instructions"]	= "<b>PS:</b> Privat informasjon om levende personer vil bare bli gitt til slektninger og nære venner.  Du vil bli spurt om å bekrefte din tilknytning / slektskap før du vil få se private data.  Av og til kan informasjon om døde personer også være private.  Hvis dette er tilfelle, er det på grunn av at det ikke funnet nok informasjon om personen til å avgjøre om vedkommende lever eller ikke, eller andre opplysninger om personen.<br /><br />Før du gjør en foresprsel, vennligst sjekk opp at det er riktig person ved å se på datoer, steder og nære slektninger.  Dersom du legger inn endringer i slektsdataene, vær vennlig å oppgi kildene der du fant dataene.<br /><br />";
$pgv_lang["sending_to"]			= "- Beskjeden vil bli sendt til #TO_USER#";
$pgv_lang["preferred_lang"]	 	= "- som ønsker at du skriver beskjeden på #USERLANG#<br />";
$pgv_lang["gedcom_created_using"]	= "Denne slektsbasen ble lagd ved hjelp av <b>#SOFTWARE# #VERSION#</b>";
$pgv_lang["gedcom_created_on"]	= "GED-filen ble lagd <b>#DATE#</b>";
$pgv_lang["gedcom_created_on2"]	= " <b>#DATE#</b>";
$pgv_lang["gedcom_stats"]		= "Statistikk for slektsbasen";
$pgv_lang["stat_individuals"]	= "personer, ";
$pgv_lang["stat_families"]		= "familier, ";
$pgv_lang["stat_sources"]		= "kilder og ";
$pgv_lang["stat_other"]			= "andre poster";
$pgv_lang["customize_page"]		= "Endre <i>din egen</i> side";
$pgv_lang["customize_gedcom_page"]	= "Endre hovedsiden til denne slektsbasen";
$pgv_lang["upcoming_events_block"]	= "Rammen Kommende begivenheter";
$pgv_lang["upcoming_events_descr"]	= "Rammen for kommende begivenheter viser en liste med begivenheter i den gjeldende aktive slektsbase (GEDCOM-fil) som vil skje de neste 30 dagene.  For en bruker vil denne rammen bare vise levende personer.  På hovedsiden vil alle personer/familier bli vist (NB. Her vil personvern-valg kunne redusere listen).";
$pgv_lang["todays_events_block"]	= "Rammen Årsdag for hendelser i slekten";
$pgv_lang["todays_events_descr"]	= "Rammen for Årsdag for hendelser viser en personliste som er knyttet til hendelser i den aktive slektsfilen dagen i dag.  Dersom det ikke er noen hendelser, vises heller ikke rammen.  På \"din\" GedView side vil denne rammen bare vise levende personer.  På hovedsiden vil alle personer / familier bli vist (NB. Her vil personvern-valg kunne redusere listen).";
$pgv_lang["logged_in_users_block"]	= "Rammen Brukere som er logget inn";
$pgv_lang["logged_in_users_descr"]	= "Rammen for brukere som er logget inn, viser en liste med bruker som er logget inn på det gjeldende tidspunktet...";
$pgv_lang["user_messages_block"]	= "Rammen Bruker-beskjeder";
$pgv_lang["user_messages_descr"]	= "Rammen for bruker-beskjeder viser en liste med beskjeder som har blitt sendt til de aktive brukerne.";
$pgv_lang["user_favorites_block"]	= "Rammen Brukeres favoritter-personer";
$pgv_lang["user_favorites_descr"]	= "Rammen for brukeres Favoritter viser en liste med deres egne \"favoritt-personer\" i slekten slik at de lett kan finnes igjen.";
$pgv_lang["welcome_block"]		= "Rammen Bruker/eier-info";
$pgv_lang["welcome_descr"]		= "Rammen for brukeres egen siden viser brukeren, gjeldende dato og tid, hurtiglinker for endre egen konto eller å gå til deres eget slektstre, og en link for å tilpasse egen siden.";
$pgv_lang["random_media_block"]	= "Rammen Tilfeldig utvalgt bilde- / mediefil";
$pgv_lang["random_media_descr"]	= "Rammen for tilfeldig viste bilde / mediefil velger et tilfeldig foto eller annet medie-objekt i den aktive GEDCOM-filen og viser det til brukeren.";
$pgv_lang["gedcom_block"]		= "Rammen Slektsbase-info";
$pgv_lang["gedcom_descr"]		= "Rammen for informasjon virker på samme måte som den enkelte brukers velkomstmelding, ved at besøkende på siden ønskes velkommen, viser tittelen på standard aktive slektsfil og gjeldende dato og tid.";
$pgv_lang["gedcom_favorites_block"]	= "Rammen Favoritter i slektsbasen";
$pgv_lang["gedcom_favorites_descr"]	= "Rammen for Favoritter gir administrator på nettstedet muligheten til å velge ut noen sentrale personer i slektsfilen som vil være av interesse for de fleste besøkende. På den måten kan de lett finne disse favoritt-personene og er en måte å fremheve disse personene som sentrale i slekthistorien.";
$pgv_lang["gedcom_stats_block"]	= "Rammen Statistikk for slektsbasen";
$pgv_lang["gedcom_stats_descr"]	= "Rammen for statistikk viser besøkende en del basis-informasjon om slektsfilen; Når den ble lagd og hvor mange personer, familier og kilder som finnes i GEDCOM-filen.";
$pgv_lang["portal_config_intructions"]	= "Her kan du tilpasse siden ved å bestemme hvor de ulike rammene på siden skal plasseres.<br />Siden er delt opp i to seksjoner, 'Hoved'-seksjonen og 'Høyre' seksjon.<br />'Hoved'-seksjonen er tildelt en større bredde og kommer under velkomsttittel på siden.<br />Den 'høyre' seksjonen begynner til høyre for tittelen og fremstår som en mer hurtiginformasjons-blokk.<br />Hver seksjon har sin egen liste med rammer som vil bli vist på siden i den rekkefølgen som de er listet.<br />Du kan legge til, fjerne og omorganisere rammene slik du ønsker det.";
$pgv_lang["login_block"]		= "Rammen Logg inn";
$pgv_lang["login_descr"]		= "Rammen for 'Logg inn' skriver et brukernavn og passord for brukere slik at de kan logg seg inn.";
$pgv_lang["theme_select_block"]	= "Rammen Velg stil";
$pgv_lang["theme_select_descr"]	= "Rammen for stilvalg viser valgfeltet for ønsket stil selv om valget for å bytte stil ikke er aktivert.";
$pgv_lang["block_top10_title"]	= "Mest viste etternavn";
$pgv_lang["block_top10"]		= "Rammen Topp 10 etternavn";
$pgv_lang["block_top10_descr"]	= "Rammen viser en tabell med de 10 mest viste etternavnene i slektsbasen";

$pgv_lang["gedcom_news_block"]	= "Rammen Nyheter for slektsbasen";
$pgv_lang["gedcom_news_descr"]	= "Nyhetsrammen viser besøkende siste nytt eller artikler lagt inn av en bruker med administrator-rettigheter.<br />Rammen er et fint sted å bekjentgjøre oppdatering av slektsbasen eller et slektstevne.";
$pgv_lang["user_news_block"]	= "Rammen Notatblokk for bruker";
$pgv_lang["user_news_descr"]	= "Rammen med en notatblokk lar den enkelte bruker legge inn notater eller som en online-oppslagstavle.";
$pgv_lang["my_journal"]			= "Min notatblokk";
$pgv_lang["no_journal"]			= "Du har ikke laget noen notater enda.";
$pgv_lang["confirm_journal_delete"]	= "Er du sikker på at du vil slette dette notatet?";
$pgv_lang["add_journal"]		= "Legg inn et nytt notat";
$pgv_lang["gedcom_news"]		= "Nyheter";
$pgv_lang["confirm_news_delete"]	= "Er du sikker på at du vil slette denne nyhetsartiklen?";
$pgv_lang["add_news"]			= "Legg inn et nyhetsinnlegg";
$pgv_lang["no_news"]			= "Ingen nyhetsartikler er blitt lagt inn...!";
$pgv_lang["edit_news"]			= "Legg til / endre notat- / nyhetsinnlegg";
$pgv_lang["enter_title"]		= "Vennligst oppgi en tittel.";
$pgv_lang["enter_text"]			= "Vennligst legg inn en tekst for dette nyhets- eller notatblokk-innlegget.";
$pgv_lang["news_saved"]			= "Nyhets- / Notablokkinnlegg er lagret...!";
$pgv_lang["article_text"]		= "Sett inn tekst:";
$pgv_lang["main_section"]		= "Hoved seksjons-rammer";
$pgv_lang["right_section"]		= "Høyre seksjons-rammer";
$pgv_lang["move_up"]			= "Flytt opp";
$pgv_lang["move_down"]			= "Flytt ned";
$pgv_lang["move_right"]			= "Flytt til høyre";
$pgv_lang["move_left"]			= "Flytt til venstre";
$pgv_lang["add_main_block"]		= "Legg til en ramme i hovedseksjon...";
$pgv_lang["add_right_block"]	= "Legg til en ramme i høyreseksjon...";
$pgv_lang["broadcast_all"]		= "Send til alle brukere";
$pgv_lang["hit_count"]			= "Antall treff:";
$pgv_lang["phpgedview_message"]	= "PhpGedView beskjed";
$pgv_lang["common_surnames"]	= "Mest brukte etternavn";
$pgv_lang["default_news_title"]		= "Velkommen til disse slektssidene";
$pgv_lang["default_news_text"]		= "Informasjon om slekten(e) på dette nettstedet blir vist ved hjelp av <a href=\"http://www.phpgedview.net/\" target=\"_blank\">PhpGedView #VERSION#</a><br />Sidene gir deg et innblikk og en oversikt over denne slekten/slektssamlingen.<br />Som en start, kan du velge personlisten på menyen, et av diagrammene eller søke etter et navn eller et sted.<br /><br />Dersom det er noe du ikke forstår på en side, sjekk Hjelp i menyen!<br />Der vil du til enhver tid få informasjon om den siden du er på.<br /><br /><b><i>Takk for at du besøker dette nettstedet.</i></b>";
$pgv_lang["reset_default_blocks"]	= "Tilbakestill til standardrammer";
$pgv_lang["recent_changes"]			= "Siste endringer";
$pgv_lang["recent_changes_block"]	= "Rammen Siste endringer";
$pgv_lang["recent_changes_descr"]	= "Rammen <i>Siste endringer</i> vil vise en liste med alle endringer som er gjort i slekts- / GEDCOM-filen den siste måneden.  Denne rammen kan hjelpe deg til å holde deg oppdatert med de endringene som er gjort.  Endringene som vises er knyttet til CHAN-merket (tag).";
$pgv_lang["delete_selected_messages"]	= "Slett beskjeder som er merket";
$pgv_lang["use_blocks_for_default"]	= "Bruke dette ramme-oppsettet som standard for alle brukere?";

//-- upgrade.php messages
$pgv_lang["upgrade_util"]		= "Verktøy for å oppgradere";
$pgv_lang["no_upgrade"]			= "Du trenger ikke å oppgradere noen filer!";
$pgv_lang["use_version"]		= "Du bruker versjon: ";
$pgv_lang["current_version"]	= "Gjeldende stabile versjon: ";
$pgv_lang["upgrade_download"]	= "Hente (download):";
$pgv_lang["upgrade_tar"]		= "TAR";
$pgv_lang["upgrade_zip"]		= "ZIP";
$pgv_lang["latest"]				= "Du bruker den siste versjonen av PhpGedView.";
$pgv_lang["location"]			= "Plassering av oppgraderingsfiler:";
$pgv_lang["include"]			= "Inkluder:";
$pgv_lang["options"]			= "Valg:";
$pgv_lang["inc_phpgedview"]		= " PhpGedView";
$pgv_lang["inc_languages"]		= " Språk";
$pgv_lang["inc_config"]			= " Konfigurasjonsfil";
$pgv_lang["inc_researchlog"]	= " Forsknings-logg";
$pgv_lang["inc_index"]			= " Indeksfiler";
$pgv_lang["inc_themes"]			= " Temaer";
$pgv_lang["inc_docs"]			= " Dokumentasjon";
$pgv_lang["inc_privacy"]		= " Personvern-fil(er)";
$pgv_lang["inc_backup"]			= " Lag sikkerhetskopi";
$pgv_lang["upgrade_help"]		= " Hjelp meg";
$pgv_lang["cannot_read"]		= "Kan ikke lese fil:";
$pgv_lang["not_configured"]		= "Du har ikke konfigurert PhpGedView enda. ";
$pgv_lang["location_upgrade"]	= "Oppgi plasseringen til oppgraderingsfilene dine.";
$pgv_lang["new_variable"]		= "Ny variabel funnet: ";
$pgv_lang["config_open_error"]	= "Det oppstod en FEIL under åpning av konfigurasjonsfilen.";
$pgv_lang["gedcom_config_write_error"] = "FEIL! Kan ikke skrive til konfigurasjonsfilen til slektsbasen (GEDCOM).";
$pgv_lang["config_update_ok"]	= "Oppdatering av konfigurasjonsfilen er utført.";
$pgv_lang["config_uptodate"]	= "Konfigurasjonsfilen din er oppdatert.";
$pgv_lang["processing"]			= "Arbeider...";
$pgv_lang["privacy_open_error"] = "Det oppstod en feil under åpning av [#PRIVACY_MODULE#] filen.";
$pgv_lang["privacy_write_error"]	= "FEIL! Kan ikke skrive til filen [#PRIVACY_MODULE#].";
$pgv_lang["privacy_update_ok"]	= "Vellykket oppdatering av personvern-filen: [#PRIVACY_MODULE#].";
$pgv_lang["privacy_uptodate"]	= "[#PRIVACY_MODULE#] filen din er oppdatert.";
$pgv_lang["heading_privacy"]	= "Personvern-fil(er):";
$pgv_lang["heading_phpgedview"]	= "PhpGedView-filer:";
$pgv_lang["heading_image"]		= "Bildefiler:";
$pgv_lang["heading_index"] 		= "Indeksfiler:";
$pgv_lang["heading_language"]	= "Språkfiler:";
$pgv_lang["heading_theme"]		= "Temafiler:";
$pgv_lang["heading_docs"]		= "Dokumentasjon:";
$pgv_lang["heading_researchlog"]	= "Filer for forsknings-logg:";
$pgv_lang["heading_researchloglang"]= "Språkfiler for forsknings-logg:";
$pgv_lang["copied_success"]		= "kopiering er utført.";
$pgv_lang["backup_copied_success"]	= "sikkerhetskopiering er ferdig.";
$pgv_lang["folder_created"]		= "Opprettet mappe";
$pgv_lang["process_error"]		= "Det har oppstått et problem med å vise siden. En nyere versjon kan ikke bestemmes.";
$pgv_lang["upgrade_completed"]	= "Oppgradering er ferdig.";
$pgv_lang["start_using_upgrad"]	= "Klikk her for å ta i bruk versjon";

//-- validate GEDCOM
$pgv_lang["performing_validation"]	= "Sjekken er utført...!  Gjør de nødvendige valgene og klikk deretter på 'Rydd'";
$pgv_lang["changed_mac"]			= "Macintosh linjeslutt oppdaget. Byttet linjeslutt med bare retur - til slutt med retur (RT) og linjeskift (LF).";
$pgv_lang["changed_places"]			= "Ugyldig Steds-koding oppdaget. Rydder opp i steds-kodene slik at de er tilpasset GEDCOM 5.5 spesifikasjonene.  Et eksempel fra GEDCOM-filen din er:";
$pgv_lang["invalid_dates"]			= "Oppdaget ugyldig dato-format. Ved rydding vil disse bli endret til formatet DD MMM ÅÅÅÅ (f.eks. 1 JAN 2004).";
$pgv_lang["valid_gedcom"]			= "Gyldig GEDCOM funnet.  Det er ikke nødvendig å gjøre endringer.";
$pgv_lang["optional_tools"]			= "Du kan også velg å kjøre følgende tilleggsverktøy før importering.";
$pgv_lang["optional"]				= "Tilleggsverktøy";
$pgv_lang["day_before_month"]		= "Dag før måned (DD MM ÅÅÅÅ)";
$pgv_lang["month_before_day"]		= "Måned før dag (MM DD YYYY)";
$pgv_lang["do_not_change"]			= "Ikke gjør endringer";
$pgv_lang["change_id"]				= "Endre personID til:";
$pgv_lang["example_date"]			= "Eksempel på ugyldig dato fra GEDCOM-filen din:";
$pgv_lang["add_media_tool"]			= "Lage koblinger til bilder / andre medier i slektsfilen";
$pgv_lang["launch_media_tool"]		= "Lag koblinger til bilder / andre medier.";
$pgv_lang["add_media_descr"]		= "Denne siden vil legge til mediemerket OBJE koblet til personer, familier mm. i slektsfilen.<br />Når du er ferdig vil de registrerte bilder og andre medier bli vist sammen med de IDen du har koblet dem til i ";
$pgv_lang["highlighted"]			= "Bruke som hovedbilde";
$pgv_lang["extension"]				= "Fil-type";
$pgv_lang["order"]					= "Rekkefølge";
$pgv_lang["inject_media_tool"]		= "Legg til media i GEDCOM-filen";
$pgv_lang["media_table_created"]	= "Oppdateringen av <i>bilde- / medie</i>-tabellen er ferdig.";
$pgv_lang["click_to_add_media"]		= "Klikk her for å Legge til bilder / medier, som er vist over, i GEDCOMfilen: #GEDCOM#";
$pgv_lang["adds_completed"]			= "Ferdig med å legge til bilder / medier i GEDCOM-filen.";
$pgv_lang["ansi_encoding_detected"]	= "Oppdaget ANSI tekstkoding.  PhpGedView fungerer best med filer som er kodet med UTF-8.";
$pgv_lang["invalid_header"]			= "Oppdaget at det er linjer før startlinjen (0 HEAD) i GEDCOM-filen.  Under oppryddingen vil disse linjene bli fjernet.";
$pgv_lang["macfile_detected"]		= "Oppdaget Macintosh-fil.  Under oppryddingen vil denne filen bli konvertert til en DOS-fil.";
$pgv_lang["place_cleanup_detected"]	= "Oppdaget ugyldig stedskoder.  Disse bør endres!  Følgende steder er ugyldige: ";
$pgv_lang["cleanup_places"]			= "Rydd opp i stedene";
$pgv_lang["empty_lines_detected"]	= "Oppdaget tomme linjer i GEDCOM-filen din.  Under oppryddingen vil disse tomme linjene bli fjernet.";

//-- hourglass chart
$pgv_lang["hourglass_chart"]	= "Timeglass";

//-- report engine
$pgv_lang["choose_report"]		= "Velg rapport";
$pgv_lang["enter_report_values"]	= "Oppsett for rapport";
$pgv_lang["selected_report"]	= "Valgt rapport";
$pgv_lang["run_report"]			= "Vis rapport";
$pgv_lang["select_report"]		= "Neste >>";
$pgv_lang["download_report"]	= "Lagre rapport";
$pgv_lang["reports"]			= "Rapporter";
$pgv_lang["pdf_reports"]		= "PDF rapporter";
$pgv_lang["html_reports"]		= "HTML rapporter";
$pgv_lang["family_group_report"]	= "Familie";
$pgv_lang["page"]				= "Side";
$pgv_lang["of"]					= "av";
$pgv_lang["enter_famid"]		= "Angi FamilieID";
$pgv_lang["show_sources"]		= "Vise kilder?";
$pgv_lang["show_notes"]			= "Vise noter?";
$pgv_lang["show_basic"]			= "Skriv ut de vanligste hendelsene<br />&nbsp;&nbsp;&nbsp;- selv om disse er tomme?";
$pgv_lang["show_photos"]		= "Vise bilder?";
$pgv_lang["individual_report"]	= "Person";
$pgv_lang["enter_pid"]			= "Angi PersonID";
$pgv_lang["individual_list_report"]	= "Liste over personer";
$pgv_lang["generated_by"]		= "Laget av";
$pgv_lang["list_children"]		= "(Sortert etter alder)";
$pgv_lang["birth_report"]		= "Fødte og fødested";
$pgv_lang["birthplace"]			= "Fødested inneholder ";
$pgv_lang["birthdate1"]			= "Vis fødte <b>fra</b> dato ";
$pgv_lang["birthdate2"]			= "Vis fødte <b>til</b> dato ";
$pgv_lang["sort_by"]			= "Sortert på ";

$pgv_lang["cleanup"]			= "Rydd";
$pgv_lang["skip_cleanup"]		= "Ikke rydd...!?";

//-- CONFIGURE (extra) messages for the programs patriarch, slklist and statistics
$pgv_lang["dynasty_list"]		= "Stamfedre";
$pgv_lang["make_slklist"]		= "Lag EXCEL (*.slk) regneark";
$pgv_lang["excel_list"]			= "Lagre følgende filer i EXCEL (slk-format) (bruk først listen stamfedre):";
$pgv_lang["excel_tab"]			= "Arkfanen:";
$pgv_lang["excel_create"]		= " vil bli lagd i filen:";
$pgv_lang["patriarch_list"]		= "Stamfedre";
$pgv_lang["slk_list"]			= "EXCEL (*.slk) regneark";
$pgv_lang["statistics"]			= "Statistikk";

//-- Merge Records
$pgv_lang["merge_records"]		= "Flette poster (dobbelregisterte)";
$pgv_lang["merge_same"]			= "Postene er ikke av samme type.  Kan ikke flette poster som er av forskjellig type!";
$pgv_lang["merge_step1"]		= "Flettesteg 1 av 3";
$pgv_lang["merge_step2"]		= "Flettesteg 2 av 3";
$pgv_lang["merge_step3"]		= "Flettesteg 3 av 3";
$pgv_lang["select_gedcom_records"]	= "Velg 2 GEDCOM poster som skal flettes.  Postene må være av samme type.";
$pgv_lang["merge_to"]			= "Flett til ID:";
$pgv_lang["merge_from"]			= "Flett fra ID:";
$pgv_lang["merge_facts_same"]	= "Følgende fakta /opplysninger er nøyaktig like i begge poster og vil bli flettet automatisk";
$pgv_lang["no_matches_found"]	= "Fant ingen like fakta-felt";
$pgv_lang["unmatching_facts"]	= "Følgende faktafelt har forskjellig innhold.  Velg de opplysningene du ønsker å beholde.";
$pgv_lang["record"]				= "Post";
$pgv_lang["adding"]				= "Legger til";
$pgv_lang["updating_linked"]	= "Oppdaterer poster som er knyttet til denne";
$pgv_lang["merge_more"]			= "Flette flere poster.";
$pgv_lang["same_ids"]			= "Du oppgav to like IDer.  Du kan ikke flette en post med seg selv.";

//-- ANCESTRY FILE MESSAGES
$pgv_lang["ancestry_chart"]		= "Forfedre";
$pgv_lang["gen_ancestry_chart"]	= "Forfedre - #PEDIGREE_GENERATIONS# slektsledd";
$pgv_lang["chart_style"]		= "Utforming";
$pgv_lang["ancestry_list"]		= "Forfedre";
$pgv_lang["ancestry_booklet"]	= "Slekts-hefte";
$pgv_lang["show_cousins"]		= "Vis søskenbarn";

//-- FAN CHART
$pgv_lang["fan_chart"]			= "Slekts-hjul";
$pgv_lang["gen_fan_chart"]		= "Slekts-hjul - #PEDIGREE_GENERATIONS# slektsledd";
$pgv_lang["fan_width"]			= "Hjul-bredde";
$pgv_lang["gd_library"]			= "Ugyldig konfigurasjon av PHP server: Biblioteket GD 2.x er nødvendig for bilde-funksjonen.";
$pgv_lang["gd_freetype"]		= "Ugyldig konfigurasjon av PHP server: Biblioteket Freetype er nødvendig for TrueType skrifttyper.";
$pgv_lang["gd_helplink"]		= "http://www.php.net/gd";
$pgv_lang["fontfile_error"]		= "Fant ikke nødvendige filer med skrifttyper på PHP serveren";
$pgv_lang["fanchart_IE"]		= "Dette slekts-hjulet kan ikke bli skrevet ut direkte fra din nettleser. Bruk høyre-klikk og velg så Lagre bilde. Så må du åpne bilde i et annet program for så å skrive det ut derfra.";

//-- RSS Feed
$pgv_lang["rss_descr"]			= "Nyheter og lenker fra nettstedet #GEDCOM_TITLE#";
$pgv_lang["rss_logo_descr"]		= "Oppføringen er laget av PhpGedView #VERSION#";
$pgv_lang["rss_feeds"]			= "RSS lenker";

//-- ASSOciates RELAtionship
// After any change in the following list, please check $assokeys in edit_interface.php
$pgv_lang["attendant"] 			= "Deltagere";
$pgv_lang["attending"] 			= "Observatør";
$pgv_lang["circumciser"]		= "Omskjærer";
$pgv_lang["civil_registrar"] 	= "Sorenskriver";
$pgv_lang["friend"] 			= "Venn";
$pgv_lang["godfather"] 			= "Gudfar";
$pgv_lang["godmother"] 			= "Gudmor";
$pgv_lang["godparent"] 			= "Gudforeldre";
$pgv_lang["informant"] 			= "Informant";
$pgv_lang["lodger"] 			= "Leietaker";
$pgv_lang["nurse"] 				= "Pleier";
$pgv_lang["priest"]				= "Prest";
$pgv_lang["rabbi"] 				= "Rabbi";
$pgv_lang["registry_officer"] 	= "Registerfører";
$pgv_lang["servant"] 			= "Tjener";
$pgv_lang["twin"] 				= "Tvilling";
$pgv_lang["twin_brother"] 		= "Tvillingbror";
$pgv_lang["twin_sister"] 		= "Tvillingsøster";
$pgv_lang["witness"] 			= "Vitne";

//-- statistics utility
$pgv_lang["statutci"]			= "klarte ikke å lage indeks";
$pgv_lang["statnnames"]         = "antall navn     =";
$pgv_lang["statnfam"]           = "antall familier =";
$pgv_lang["statnmale"]          = "antall menn     =";
$pgv_lang["statnfemale"]        = "antall kvinner  =";
$pgv_lang["statvars"]			= "Fyll inn følgende variabler for diagrammet";
$pgv_lang["statlxa"]			= "langs x-aksen:";
$pgv_lang["statlya"]			= "langs y-aksen:";
$pgv_lang["statlza"]			= "langs z-aksen";
$pgv_lang["stat_10_none"]		= "ingen";
$pgv_lang["stat_11_mb"]			= "Fødselsmåned";
$pgv_lang["stat_12_md"]			= "Dødsmåned";
$pgv_lang["stat_13_mm"]			= "Ekteskapsmåned";
$pgv_lang["stat_14_mb1"]		= "Fødselsmåned for førstefødte i familie";
$pgv_lang["stat_15_mm1"]		= "Måned for første ekteskap";
$pgv_lang["stat_16_mmb"]		= "Måneder mellom ekteskap og første barn.";
$pgv_lang["stat_17_arb"]		= "alder i forhold til fødselsår.";
$pgv_lang["stat_18_ard"]		= "alder i forhold til dødsår.";
$pgv_lang["stat_19_arm"]		= "alder i forhold til vigselår.";
$pgv_lang["stat_20_arm1"]		= "alder ved første ekteskap.";
$pgv_lang["stat_21_nok"]		= "antall barn.";
$pgv_lang["stat_gmx"]			= " sjekk akse-verdier for måned";
$pgv_lang["stat_gax"]			= " sjekk akse-verdier for alder";
$pgv_lang["stat_gnx"]			= " sjekk akse-verdier for antall";
$pgv_lang["stat_200_none"]		= "alle (eller tom)";
$pgv_lang["stat_201_num"]		= "antall";
$pgv_lang["stat_202_perc"]		= "prosent";
$pgv_lang["stat_300_none"]		= "ingen";
$pgv_lang["stat_301_mf"]		= "mann/kvinne";
$pgv_lang["stat_302_cgp"]		= "perioder. Sjekk akse-verdier (z-akse)";
$pgv_lang["statmess1"]			= "<b>Bare fyll ut neste rader i forhold til tidligere verdier for x-akse eller z-akse</b>";
$pgv_lang["statar_xgp"]			= "akse-verdier for perioder (x-axis):";
$pgv_lang["statar_xgl"]			= "akse-verdier for alder    (x-axis):";
$pgv_lang["statar_xgm"]			= "akse-verdier for måned    (x-axis):";
$pgv_lang["statar_xga"]			= "akse-verdier for antall   (x-axis):";
$pgv_lang["statar_zgp"]			= "akse-verdier for perioder (z-axis):";
$pgv_lang["statreset"]			= "Nullstill";
$pgv_lang["statsubmit"]			= "Vis diagram";

//-- statisticsplot utility
$pgv_lang["stpl"]			 	= "...";
$pgv_lang["stplGDno"]			= "Grafisk visningsbiblitek er ikke tilgjengelig i PHP 4. Vennligst kontakt verten for nettstedet ditt";
$pgv_lang["stpljpgraphno"]		= "JPgraph moduler finnes ikke i katalogen <i>phpgedview/jpgraph/</i>.  Vennligst hent dem hos http://www.aditus.nu/jpgraph/jpdownload.php<br> <h3>Installer først JPgraph i katalogen <i>phpgedview/jpgraph/</i></h3><br>";
$pgv_lang["stplinfo"]			= "diagram-informasjon:";
$pgv_lang["stpltype"]			= "type:";
$pgv_lang["stplnoim"]			= " ikke tilgjengelig:";
$pgv_lang["stplmf"]			 	= " / mann-kvinne";
$pgv_lang["stplipot"]			= " / per tidsperiode";
$pgv_lang["stplgzas"]			= "rammer z-akse:";
$pgv_lang["stplmonth"]			= "måned";
$pgv_lang["stplnumbers"]		= "antall for en familie";
$pgv_lang["stplage"]			= "alder";
$pgv_lang["stplperc"]			= "prosent";

//-- alive in year
$pgv_lang["alive_in_year"]		= "\"I det Herrens år\"";
$pgv_lang["is_alive_in"]		= "<i>I det Herrens år&nbsp;&nbsp;#YEAR#</i>";
$pgv_lang["alive"]				= "Levende ";
$pgv_lang["dead"]				= "Død ";
$pgv_lang["maybe"]				= "Kanskje ";

//-- find media
$pgv_lang["add_directory"]		= "Opprett mappe/katalog";
$pgv_lang["show_thumbnail"]		= "Vis passfoto";
$pgv_lang["image_size"]			= "Bilde-størrelse -- ";
$pgv_lang["no_thumb_dir"]		= " mappen/katalogen for passfoto finnes ikke og den kunne heller ikke opprettes.";
$pgv_lang["manage_media"]		= "Behandling av bilder";
$pgv_lang["gen_thumb"]			= "Lage passfoto";
$pgv_lang["move_to"]			= "Flytt til --&gt;";
$pgv_lang["security_no_create"]	= "Sikkerhetsadvarsel: Filen <b><i>index.php</i></b> finnes ikke i ";
$pgv_lang["security_not_exist"]	= "Sikkerhetsadvarsel: Klarte ikke å lage filen <b><i>index.php</i></b> i ";
$pgv_lang["illegal_chars"]		= "Ugyldige tegn i navn";

//-- link media
$pgv_lang["link_media"]			= "Kobling av Media";
$pgv_lang["to_person"]			= "Til person";
$pgv_lang["to_family"]			= "Til familie";
$pgv_lang["to_source"]			= "Til kilde";
$pgv_lang["media_id"]			= "Media ID";
$pgv_lang["invalid_id"]			= "Ukjent ID i denne slektsbasen.";

//-- Help system
$pgv_lang["definitions"]		= "Definisjoner";


if (file_exists($PGV_BASE_DIRECTORY . "languages/lang.no.extra.php")) require $PGV_BASE_DIRECTORY . "languages/lang.no.extra.php";

?>