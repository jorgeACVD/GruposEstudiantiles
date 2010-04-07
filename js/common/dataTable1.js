var dataTable;

$(document).ready(function() {
    dataTable = $('#dataTable1').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "oLanguage": {
			"sUrl": "http://localhost/capcie/translations.txt"
		}
    });
});