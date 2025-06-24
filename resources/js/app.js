import Alpine from "alpinejs";
import $ from "jquery";
import DataTable from "datatables.net-dt";
import "datatables.net-buttons-dt";
import "datatables.net-colreorder-dt";
import "datatables.net-columncontrol-dt";
import "datatables.net-responsive-dt";
import "datatables.net-searchbuilder-dt";

import "./bootstrap";

window.Alpine = Alpine;
window.DataTable = DataTable;
window.$ = window.jQuery = $;

Alpine.start();
