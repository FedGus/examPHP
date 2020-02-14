<?php
$p = PDF_new();

/*  Создание нового PDF-файла; указание имени PDF-файла для размещения на диске */
if (PDF_begin_document($p, "", "") == 0) {
    die("Ошибка: " . PDF_get_errmsg($p));
}

PDF_set_info($p, "Title", "Schet na pechat");

PDF_begin_page_ext($p, 595, 842, "");

$font = PDF_load_font($p, "Arial", "winansi", "");

PDF_setfont($p, $font, 16.0);
PDF_set_text_pos($p, 50, 700);
PDF_show($p, "Schet na pechat'");

PDF_continue_text($p, '');

PDF_continue_text($p, 'FIO:');
PDF_continue_text($p, $_POST['name']);

PDF_continue_text($p, '');

PDF_continue_text($p, 'Sum cost:');
PDF_continue_text($p, $_POST['cost']);

PDF_continue_text($p, '');

PDF_continue_text($p, 'Color:');
PDF_continue_text($p, $_POST['color']);
PDF_continue_text($p, 'Cost of color:');
PDF_continue_text($p, $_POST['price-color']);

PDF_continue_text($p, '');

PDF_continue_text($p, 'Size of list:');
PDF_continue_text($p, $_POST['format']);
PDF_continue_text($p, 'Cost size of list:');
PDF_continue_text($p, $_POST['price-format']);

PDF_continue_text($p, '');

PDF_continue_text($p, 'Thickness of list:');
PDF_continue_text($p, $_POST['density']);
PDF_continue_text($p, 'Cost of thickness of list:');
PDF_continue_text($p, $_POST['price-thickness']);

PDF_continue_text($p, '');

PDF_continue_text($p, 'Number:');
PDF_continue_text($p, $_POST['tiraz']);
PDF_continue_text($p, 'Cost number of list:');
PDF_continue_text($p, $_POST['price-quantity']);

PDF_end_page_ext($p, "");

PDF_end_document($p, "");

$buf = PDF_get_buffer($p);
$len = strlen($buf);

header("Content-type: application/pdf");
header("Content-Length: $len");
header("Content-Disposition: inline; filename=order.pdf");
print $buf;

PDF_delete($p);
?>