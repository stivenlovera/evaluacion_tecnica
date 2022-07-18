$("#ordenar").change(function () {
    console.log('order')
    table.ajax.url(`${base_url}/usuario/data-table?orden=${$(this).val()}`).load();
});