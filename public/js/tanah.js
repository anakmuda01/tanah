$(document).ready(function(){
  var x = parseInt($('#total_harga').val());

  $("#uang_muka").focusin(function(){
    $("#lama_angsuran").val('');
    $("#angsuran_perbulan").val('');
    $("#angsuran").text('Rp. 0');
    var no = $("#uang_muka").val();
    var yes = no.replace(',00',"").replace(/[^0-9]/g, "");
    $("#uang_muka").val(yes);
    $("#uang_muka").attr('type','number');
  });

  $("#uang_muka").focusout(function(){
    var y = parseInt($('#uang_muka').val());
    if(isNaN(y)){
      y = 0;
    }
    var h = x-y;
    var baz = (h/1).toFixed(2).replace('.', ',');
    var cok = (y/1).toFixed(2).replace('.', ',');
    var out = cok.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    var output = baz.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    $("#sisa").text('Rp. '+output);
    $("#sisa_angsuran").val(h);
    $("#uang_muka").attr('type','text');
    $("#uang_muka").val('Rp. '+out);
  });

  $("#lama_angsuran").keyup(function(){
    var k = parseInt($('#lama_angsuran').val());
    var p = $("#sisa_angsuran").val();
    var as = p/k;
    var lol = (as/1).toFixed(2).replace('.', ',');
    var lel = lol.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    $("#angsuran").text('Rp. '+lel);
    $("#angsuran_perbulan").val(as);
  });

  $("#harga_tanah").focusin(function(){
    var um = $("#harga_tanah").val();
    var em = um.replace(',00',"").replace(/[^0-9]/g, "");
    $("#harga_tanah").val(em);
    $("#harga_tanah").attr('type','number');
  });

  $("#harga_tanah").focusout(function(){
    var r = parseInt($('#harga_tanah').val());
    if(isNaN(r)){
      r = 0;
    }
    var rok = (r/1).toFixed(2).replace('.', ',');
    var fok = rok.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    $("#harga_tanah").attr('type','text');
    $("#harga_tanah").val('Rp. '+fok);
  });
});
