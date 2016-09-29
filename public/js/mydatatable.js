$(function () {
    $('.table-employee').dataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                filename: 'AMI Employee\'s List',
                title: 'AMI Employee\'s List Report',
                header: true,
                orientation: 'landscape',
                pageSize: 'A4',
                message: 'The following is a list of PT. Andalas Eko Medika Infotama Konsultan employee\'s report.',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8,9],
                },
            },
            {
                extend: 'excel',
                filename: 'AMI Employee\'s List',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8,9],
                },
            },
        ],
        procesing: true,
        serverSide: true,
        responsive: true,
        ajax: '/admin/employee/view',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'email', name: 'email' },
            { data: 'name', name: 'name' },
            { data: 'p_o_b', name: 'p_o_b' },
            { data: 'd_o_b', name: 'd_o_b' },
            { data: 'gender', name: 'gender' },
            { data: 'religion', name: 'religion' },
            { data: 'address', name: 'address' },
            { data: 'phone', name: 'phone' },
            { data: 'position', name: 'position' },
            { data: 'role', name: 'role' },
            { data: 'last_login', name: 'last_login' },
            { data: 'action', name: 'action' },
        ]
    });
});
