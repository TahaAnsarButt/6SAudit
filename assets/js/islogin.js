let user_id = sessionStorage.getItem('Login_id')

window.onload = function() {
    if(!user_id || user_id.trim() === ''){
        window.location.href = 'http://10.10.100.4:2000/6SAudit/loginController'
    }
    else{
        console.log('no issue',user_id);
    }
}
