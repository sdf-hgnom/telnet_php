let all_numbers = [];
for (let i =0;i<cameras.length;i++){
    all_numbers.push(cameras[i].number);
}
$("#id_text").val(all_numbers);
alert('test ');
let res = $("#id_text").val();
alert(res);
$("#id_submit").click();

