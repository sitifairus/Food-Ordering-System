$(document).ready(function(){

    var url = "/FoodOrderingSystem/public/CounterStaff";

    //display modal form for task editing
    $('.open-modal').click(function(){
        var order_id = $(this).val();

        $.get(url + '/' + order_id, function (data) {
            //success data
            console.log(data);
            $('#order_id').val(data.id);
            $('#order_status').val(data.order_status);
            $('#queue_number').val(data.queue_number);
            $('#total_price').val(data.total_price);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        }) 
    });

    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmOrders').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete task and remove it from list
    $('.delete-order').click(function(){
        var order_id = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + '/' + order_id,
            success: function (data) {
                console.log(data);

                $("#order" + order_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new task / update existing task
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            order_status: $('#order_status').val(),
            queue_number: $('#queue_number').val(),
            total_price: $('#total_price').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var order_id = $('#order_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + order_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var order = '<tr id="order' + data.id + '"><td>' + data.id + '</td><td>' + data.order_status + '</td><td>' + data.queue_number + '</td><td>' + data.total_price + '</td>';
                order += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                order += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#orders-list').append(order);
                }else{ //if user updated an existing record

                    $("#order" + order_id).replaceWith( order );
                }

                $('#frmOrders').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});