document.addEventListener("DOMContentLoaded",function(){!function(a,e){e().DataTable?(e.extend(e.fn.dataTable.defaults,{autoWidth:!1,columnDefs:[{orderable:!1,width:120,className:"text-center",targets:[0]}]}),a.DuoLeeDataTables=a.DuoLeeDataTables||{},a.DuoLeeDataTables["%1$s"]=e("#%1$s").DataTable(%2$s)):console.warn("Warning - datatables.min.js is not loaded.")}(window,jQuery)});