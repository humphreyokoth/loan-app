$(document).ready(function() {
$('#datatable').DataTable();
$('#datatable1').DataTable();
$('#datatable2').DataTable();
$('#datatable3').DataTable();
$('[data-toggle="tooltip"]').tooltip();

// Auto logout
function idleTimer()
{
    var t;
    window.onclick     =   resetTimer;  // catches mouse clicks
    window.onscroll    =   resetTimer;  // catches scrolling
    window.onkeypress  =   resetTimer;  //catches keyboard actions

    function logout() {
        window.location.href = `${base_url}logout`;
        
    }

    function resetTimer() 
    {
    clearTimeout(t);
    t= setTimeout(logout,3600);//5minutes timeout
    }
}
idleTimer();
} );