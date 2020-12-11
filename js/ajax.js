$(document).ready(function(){
    //Delete
    $("table").on("click", ".delete", function(){
        let val = $(this).attr("value");
        $(`#${val}`).load(`process.php?delete=${val}`)
    })

    //Edit/Read
    $("table").on("click", ".edit", function(){
        let val = $(this).attr("value");
        $(".update").attr("value", val);
        $(".update").text("Update");        

        $.get(`process.php?edit=${val}`, (obj) => {
            let update = JSON.parse(obj)
            $("#name").attr("value", update.name);
            $("#age").attr("value", update.age);
            $("#location").attr("value", update.location);
        })
    })

    //Updation and Creation on a single button
    $(".update").click(function(){
        let name = $("#name").val();
        let age = $("#age").val();
        let location = $("#location").val();
        
        let createUpdate = function(obj) {
            let update = JSON.parse(obj);
            let id = update.id;
            if (document.getElementById(id) == null) {
                $('table').append(`<tr id="${id}"><td>${id}</td><tr>`)
            }
            else {
                $(`#${id}`).html(`<td>${update.id}</td>`)
            }
            $(`#${id}`).append(`<td>${update.name}</td>`);
            $(`#${id}`).append(`<td>${update.age}</td>`);
            $(`#${id}`).append(`<td>${update.location}</td>`);
            $(`#${id}`).append(`
            <td> 
            <button class="btn btn-primary edit" value="${id}" >Edit</button>
            <button class="btn btn-danger delete" value="${id}">Delete</button>
            </td>
            `);
        }
        
        if ($(this).text() == "Create") {
            $.get(`process.php?create&name=${name}&age=${age}&location=${location}`, createUpdate);
        }
        else {
            let id = $(this).attr("value");
            $.get(`process.php?update=${id}&name=${name}&age=${age}&location=${location}`, createUpdate);
        }
        $(this).text("Create")
    })
    
 
})

