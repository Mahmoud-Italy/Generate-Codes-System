<script>
   $(document).ready(function(){
    var href = window.location.href;
    var split = href.split(":8000/")[1];
    alert(split);

    if(split == 'scopes') {
        $('.li').removeClass("active");
        $("#scopes").addClass("active");
    } else if (split == 'products' && !split2) {
        $('.li').removeClass("active");
        $("#products").addClass("active");
    } else if (split == 'products' && split2 == 'materials') {
        $('.li').removeClass("active");
        $("#materials").addClass("active");
    } else if (split == 'products' && split2 == 'price') {
        $('.li').removeClass("active");
        $("#price").addClass("active");
    } else if (split == 'marketing') {
        $('.li').removeClass("active");
        $("#marketing").addClass("active");
    } else if (split == 'sales') {
        $('.li').removeClass("active");
        $("#sales").addClass("active");
    } else if (split == 'orders' && split2 == 'hold') {
        $('.li').removeClass("active");
        $("#hold").addClass("active");
    } else if (split == 'orders') {
        $('.li').removeClass("active");
        $("#orders").addClass("active");
    } else if (split == 'binding') {
        $('.li').removeClass("active");
        $("#binding").addClass("active");
    } else if (split == 'members') {
        $('.li').removeClass("active");
        $("#members").addClass("active");
    } else if (split == 'balances') {
        $('.li').removeClass("active");
        $("#balances").addClass("active");
    } else if (split == 'feedback') {
        $('.li').removeClass("active");
        $("#feedback").addClass("active");
    } else if (split == 'payment-method') {
        $('.li').removeClass("active");
        $("#payment-method").addClass("active");
    } else if (split == 'pg' && split2 == 'request-pricing') {
        $('.li').removeClass("active");
        $("#request-pricing").addClass("active");
    } else if (split == 'pg' && split2 == 'complaints') {
        $('.li').removeClass("active");
        $("#complaints").addClass("active");
    } else if (split == 'pg' && split2 == 'messages') {
        $('.li').removeClass("active");
        $("#messages").addClass("active");
    } else if (split == 'pg' && split2 == 'videos') {
        $('.li').removeClass("active");
        $("#videos").addClass("active");
    } else if (split == 'pg' && split2 == 'gallery') {
        $('.li').removeClass("active");
        $("#gallery").addClass("active");
    } else if (split == 'pg' && split2 == 'help') {
        $('.li').removeClass("active");
        $("#help").addClass("active");
    } else if (split == 'pg' && split2 == 'about') {
        $('.li').removeClass("active");
        $("#about").addClass("active");
    } else if (split == 'pg' && split2 == 'privacy-policy') {
        $('.li').removeClass("active");
        $("#privacy-policy").addClass("active");
    } else if (split == 'reports') {
        $('.li').removeClass("active");
        $("#reports").addClass("active");
    } else {
       $('.li').removeClass("active");
      $("#layout").addClass("active");
    }
});
</script>