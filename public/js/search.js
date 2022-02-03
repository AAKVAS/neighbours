var magnifier = document.getElementById('magnifierImg');
var search_parameter = document.getElementById('search_parameter');

magnifier.onclick = function (){
    let pattern = new RegExp(search_parameter.value, 'i');

    let user_info_blocks = document.getElementsByClassName('user_info');
    for (let i = 0; i < user_info_blocks.length; i++) {
        let about_users = user_info_blocks[i].getElementsByClassName('about_user');
        let about_users_value = about_users[0].innerText
        if (about_users_value.match(pattern) === null) {
            user_info_blocks[i].style.display = "none";
        }
        else {
            user_info_blocks[i].style.display = "block";
        }
    }
}


