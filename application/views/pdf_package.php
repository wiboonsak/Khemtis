<section class="sheet padding-20mm" id="pdf">

    <ul>
      <li>41/94 ถนนแจ้งวัฒนา ปากเกร็ด นนทบุรี 11120</li>
      <li>โทร. +66 085.900.3405</li>
      <li>เว็บไซต์ : www.codebee.co.th</li>
    </ul>

    <article>
      <h2>from:</h2>
      <p>บริษัท โค๊ดบี จำกัด</p>

      <h3>For:</h3>
      <p>บริษัท แฮปปี้ แคท เฮ้า จำกัด</p>

      <h4>1,000THB</h4>
      <ul>
        <li>Tax: included</li>
        <li>Paid by: cash</li>
        <li>No. 00001</li>
        <li>Oct 10, 2017</li>
      </ul>
    </article>

  </section>

  <input type="button" onclick="" value="Click 1">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


  <script>
      
//https://jsfiddle.net/7ymv11ag/

      $(function() {
  $("#btnSave").click(function() {
    html2canvas($("#widget"), {
      onrendered: function(canvas) {
        Canvas2Image.saveAsPNG(canvas);
      }
    });
  });

  $("#btnSave2").click(function() {
    html2canvas($("#widget"), {
      onrendered: function(canvas) {
        saveAs(canvas.toDataURL(), 'canvas.png');
      }
    });
  });

  function saveAs(uri, filename) {
    var link = document.createElement('a');
    if (typeof link.download === 'string') {
      link.href = uri;
      link.download = filename;

      //Firefox requires the link to be in the body
      document.body.appendChild(link);

      //simulate click
      link.click();

      //remove the link when done
      document.body.removeChild(link);
    } else {
      window.open(uri);
    }
  }
});


/*

var baseURL = "<?php// echo base_url(); ?>";
function downloadPDF(pdf_id){
    alert(pdf_id);
    $("#"+pdf_id).css({ opacity: 1 });
    html2canvas([document.getElementById(pdf_id)], {
        onrendered: function(canvas) {
           var image = canvas.toDataURL('image/png');
           SaveImage(image);
        }
    });
}

function SaveImage(image){
    alert(baseURL+'Createpdf/save');
    $.ajax({
        type: 'POST',
        url: baseURL+'Createpdf/save',
        data: {base64Image:image,image_name:"pdf"},
        success: function(image) {
            var d = new Date();
            var n = d.getTime();
            window.location = image+"?t="+n;
        }
    });
}

 downloadPDF("pdf");

/*
$(document).ready(function(){
    setTimeout(init, 1000); 
});
function init(){
   
}
*/

  </script>