<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

</head>
<body>

<div id="signature-pad" class="m-signature-pad">
  <div class="m-signature-pad--body">
    <canvas style="border: 2px dashed #ccc"></canvas>
  </div>

  <div class="m-signature-pad--footer">
    <button type="button" class="btn btn-sm btn-secondary" data-action="clear">Clear</button>
    <button type="button" class="btn btn-sm btn-primary" data-action="save">Save</button>
  </div>
</div>

<script type="text/javascript">
$(function () {
  var wrapper = document.getElementById("signature-pad"),
      clearButton = wrapper.querySelector("[data-action=clear]"),
      saveButton = wrapper.querySelector("[data-action=save]"),
      canvas = wrapper.querySelector("canvas"),
      signaturePad;

  // Adjust canvas coordinate space taking into account pixel ratio,
  // to make it look crisp on mobile devices.
  // This also causes canvas to be cleared.
  window.resizeCanvas = function () {
    var ratio =  window.devicePixelRatio || 1;
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
  }

  resizeCanvas();

  signaturePad = new SignaturePad(canvas);

  clearButton.addEventListener("click", function(event) {
    signaturePad.clear();
  });

  saveButton.addEventListener("click", function(event) {
    event.preventDefault();

    if (signaturePad.isEmpty()) {
      alert("Please provide a signature first.");
    } else {
      var dataUrl = signaturePad.toDataURL();
      var image_data = dataUrl.replace(/^data:image\/(png|jpg);base64,/, "");

      $.ajax({
        url: '/save-signature',
        type: 'POST',
        data: {
          image_data: image_data,
        },
      }).done(function() {
        //
      });
    }
  });
});

</script>
</body>
</html>