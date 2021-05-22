$(document).ready(function () {

    $('.cloning').on('click', function (e) {
        e.preventDefault();
        let cloned_element;
        if ($('.removed_btn').length > 1) {
            cloned_element = $('div.clone_div').eq(1);
        } else {
            cloned_element = $('div.clone_div').eq(0);
        }
        $(cloned_element).clone().insertAfter('div.clone_div:last');
    });

        $('#filter_btn').on('click', function () {
        let day;
        if ($("input[name=search_date]").val() !== "") {
            day = new Date($("input[name=search_date]").val())
            day = day.getDay() - 1;
        } else {
            day = new Date().getDay() - 1;
        }
        $.ajax({
            url: "/teacher/teacher_timetable",
            type: "GET",
            dataType: 'json',
            data: {
                day: day,
            },
            success: function (data) {
                let days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                $("#table_id > tbody").empty();
                data.forEach(function (obj, index) {
                    $("tbody").append('<tr>' +
                        '<td>' + ++index + '</td>' +
                        '<td>' + obj.groupName + '</td>' +
                        '<td>' + days[obj.week_day] + '</td>' +
                        '<td>' + obj.lesson_time + '</td></tr>')
                });
            },
            error: function (error) {
                console.log(error)
            },
        });
    });

    let edited = $('.edited');
    for(let i = 0; i < edited.length; i ++){
        let variant_key = $(edited[i]).find('.variant');
        for (let j = 0; j < variant_key.length; j ++){
            $(variant_key[j]).html(String.fromCharCode(65+j));
        }
    }
});

function removed(element) {
    element.closest('.clone_div').remove();
}

function change(element) {
    if ($(element).is(':checked')) {
        $(element).prev().val(1);
    } else {
        $(element).prev().val(0);
    }
}

function changing_type(element) {
    let question_id = $(element).closest('.test-content').find('.hiddens').val();

    $(element).closest('.test-content').find('.type').prop('name', 'question_type_id[' + question_id + '][' + element.value + ']');

    if (parseInt(element.value) === 1) {
        $(element).closest(".test-content").find('input[type=checkbox]')
            .prop('type', 'radio')
            .prop('name', 'question_type_id[' + question_id + '][' + element.value + ']');
        $(element).closest(".test-content").find('.hidden_type_value').val(element.value);
    }

    else if (parseInt(element.value) === 2) {

        $(element).closest(".test-content").find('input[type=radio]').prop('type', 'checkbox');

        $(element).closest(".test-content").find('.hidden_type_value').val(element.value);
    }
}

function add_test(element) {
    let hidden_value = document.querySelectorAll('.hiddens');
    let arr_quest = [];
    hidden_value.forEach(function (element, index){
        arr_quest[index] = element.value;
    });

    let max_quest_id = Math.max(...arr_quest);
    max_quest_id++;

    $(element).closest('.test-content').clone().insertAfter('div.test-content:last');

    let remove_element = $('.test-content:last').find('.answer_input');

    for (let i = 1; i < remove_element.length; i ++){
        $(remove_element[i]).remove();
    }

    let counter_label = $('.test-content:last').find('.counter');
    let count = document.querySelectorAll('.test-content').length;
    $(counter_label).text(count);

    let hidden_value_ans = document.querySelectorAll('input.ans_hidden');

    let arr = [];
    hidden_value_ans.forEach(function (element, index){
         arr[index] = element.value;
    });

    let max = Math.max(...arr);
    max++;
    $('.test-content:last').find('input.ans_hidden:first').val(max);

    $(".test-content:last").find('input.ans').val("");

    $(".test-content:last").find('input.question').val("");

    $('.test-content:last').find('input.hiddens:last').val(max_quest_id);

    $(`.test-content:last`).find('input').prop('checked', false);

    $('.test-content:last').find('.ans:last').prop('name', 'answer[' + max_quest_id + '][' + max + ']');

    $('.test-content:last').find('.set_check:last').prop('name', 'is_check[' + max_quest_id + '][' + max + ']');

    $('.test-content:last').find('.type:last').prop('name', 'question_type_id[' + max_quest_id + '][' + 2 + ']');

    $(".test-content:last").find('.hidden_type_value').val(2);

    $(".test-content:last").find('input[type=radio]').prop('type', 'checkbox');
}

function remove_test(element) {
        $.ajax({
            url: "/teacher/remove_question",
            type: "GET",
            dataType: 'json',
            data: {
                id: $(element).data('id')
            },
            success: function (data) {
                if(data === 1){
                    alert("delete");
                }
            },
            error: function (error) {
                console.log(error)
            },
        });
        element.closest('.test-content').remove();
}

function add_answer(element) {
    let hidden_value_ans = document.querySelectorAll('input.ans_hidden');
    let arr = [];
    hidden_value_ans.forEach(function (element, index){
        arr[index] = element.value;
    });
    let max = Math.max(...arr);
    max++;

      let hidden_value = $(element).closest('.test-content').find('input.hiddens').val();

    let variant_last_value = $(element).closest('.test-content').find('.variant:last').html();
    let variant_value = variant_last_value.charCodeAt(0);
    variant_value++;
    let cloned_element = $(element).closest('.test-content').find('.answer_input:last');
    $(cloned_element).clone().insertAfter(cloned_element);
    $(element).closest('.test-content').find('.variant:last').html(String.fromCharCode(variant_value));

    $(element).closest('.test-content').find('.ans:last').val("");

    $(element).closest('.test-content').find('input.ans_hidden:last').val(max);

    $(element).closest('.test-content').find('.ans:last').prop('name', 'answer[' + hidden_value + '][' + max + ']');

    $(element).closest('.test-content').find('.set_check:last').prop('name', 'is_check['+ hidden_value + '][' + max + ']');
}

function remove_answer(element) {
    let count_div = $(element).closest('.test-content').find('.answer_input').length;
    if (count_div > 1){
        $.ajax({
            url: "/teacher/remove_answer",
            type: "GET",
            dataType: 'json',
            data: {
                answer_id: parseInt($(element).data('answer_id'))
            },
            success: function (data) {
                console.log(data)
            },
            error: function (error) {
                console.log(error)
            },
        });
        element.closest('.answer_input').remove();

    }
    else {
        alert('Oxirgi maydonni o\'chira olmaysiz!')
    }
}
