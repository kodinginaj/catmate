$(".list2").hide(); 

$('.kategori').click(function(){

    var id = $(this).data('id');

    var base_url = "http://localhost/catmate/index.php/";
    var base_url2 = "http://localhost/catmate/";

    $(".hehe").html("");
    $('.all').removeClass('btn-secondary-category-active');

    $('.kategori').removeClass('btn-secondary-category-active');
    $(this).removeClass('btn-secondary-category').addClass('btn-secondary-category-active');

    output = "<div class='col-lg-3 mb-4'>";
    output += "<div class='card pricing popular'>";
    output += "<div class='card-body'>";
    output += "<a href=''>";
    output += "<div class='bungkus-card-tambah'>";
    output += "<img src='"+base_url2+"assets/images/addcat.png' class='w-100'>";
    output += "<div class='overlay'>";
    output += " <div class='text'>Add A Cat</div>";
    output += "</div>";
    output += "</div>";
    output += "</a>";
    output += "</div>";
    output += "</div>";
    output += "</div>";
    
    $.ajax({
    type: "POST",
    data: "id="+id,
    url : base_url+'User/getKategori',
    success : function(result){
      var objResult=JSON.parse(result);

      $.each(objResult, function(i, v){
        
        output += "<div class='col-lg-3 mb-4'>";
        output += "<div class='card pricing popular'>"; 
        output += "<div class='card-body'>"; 
        output += "<div class='bungkus-card'>"; 
        output += "<img src='"+base_url2+v.foto+"' class='w-100'>"; 
        output += "<div class='overlay'>";
        output += " <div class='text'>";
        output += ""+v.nama+"";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "<div class='row'>";
        output += "<div class='col-lg-6 pr-2'>";
        output += "<a href='#' class='btn btn-catmate btn-lg btn-block mt-4'>Detail</a>";
        output += "</div>";
        output += "<div class='col-lg-6 pl-2'>";
        output += "<a href='#' class='btn btn-catmate-secondary btn-block mt-4'>Edit</a>";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "</div>";
    
        $(".hehe").html(output);

        });
    }});
})

$('.kategoriAll').click(function(){

    var base_url = "http://localhost/catmate/index.php/";
    var base_url2 = "http://localhost/catmate/";

    $(".hehe").html("");
    $('.all').removeClass('btn-secondary-category-active');

    $('.kategori').removeClass('btn-secondary-category-active');
    $(this).removeClass('btn-secondary-category').addClass('btn-secondary-category-active');

    console.log($(this).attr("class"));

    output = "<div class='col-lg-3 mb-4'>";
    output += "<div class='card pricing popular'>";
    output += "<div class='card-body'>";
    output += "<a href=''>";
    output += "<div class='bungkus-card-tambah'>";
    output += "<img src='"+base_url2+"assets/images/addcat.png' class='w-100'>";
    output += "<div class='overlay'>";
    output += " <div class='text'>Add A Cat</div>";
    output += "</div>";
    output += "</div>";
    output += "</a>";
    output += "</div>";
    output += "</div>";
    output += "</div>";
    
    $.ajax({
    type: "POST",
    url : base_url+'User/getKategoriAll',
    success : function(result){
      var objResult=JSON.parse(result);

      $.each(objResult, function(i, v){
        
        output += "<div class='col-lg-3 mb-4'>";
        output += "<div class='card pricing popular'>"; 
        output += "<div class='card-body'>"; 
        output += "<div class='bungkus-card'>"; 
        output += "<img src='"+base_url2+v.foto+"' class='w-100'>"; 
        output += "<div class='overlay'>";
        output += " <div class='text'>";
        output += ""+v.nama+"";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "<div class='row'>";
        output += "<div class='col-lg-6 pr-2'>";
        output += "<a href='#' class='btn btn-catmate btn-lg btn-block mt-4'>Detail</a>";
        output += "</div>";
        output += "<div class='col-lg-6 pl-2'>";
        output += "<a href='#' class='btn btn-catmate-secondary btn-block mt-4'>Edit</a>";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "</div>";
        output += "</div>";
    
        $(".hehe").html(output);

        });
    }});
});