$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function fetchAllTasks(){
       $("#task").on('click', function(){
        $.ajax({
            url: '/tasks',
            type: 'GET',
            contentType: false,
            processType: false,
            success: function(response){
                let table = `<table><tr>
                <th>Sr.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                </tr>`;
                $.each(response.data, function(index, item){
                    table += `<tr>
                        <td>${index+1}</td>
                        <td>${item.title}</td>
                        <td>${item.description}</td>
                        <td>${item.status}</td>
                        <td>${item.assigned_to}</td>
                        <td>${item.due_date}</td>
                    </tr>`;
                });
                table +=   `</table>`;
                $("#main").html(table);
            },
            error: function(xhr){
                console.log(xhr.error());
            }
        });
       });
    }
    fetchAllTasks();
});
