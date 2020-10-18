const videoPlayer = document.querySelector('#player');

const width = 320;
const height = 240;
let   zIndex = 1;

window.addEventListener("load", (event) => startMedia());

const startMedia = () => {
  if (!('mediaDevices' in navigator)) {
    navigator.mediaDevices = {};
  }

  if (!('getUserMedia' in navigator.mediaDevices)) {
    navigator.mediaDevices.getUserMedia = (constraints) => {
      const getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

       if (!getUserMedia) {
          return Promise.reject(new Error('getUserMedia is not supported'));
        } else {
          return new Promise((resolve, reject) => getUserMedia.call(navigator, constraints, resolve, reject));
        }
    };
  }

  navigator.mediaDevices.getUserMedia({video: true})
    .then((stream) => {
      videoPlayer.srcObject = stream;
      videoPlayer.style.display = 'block';
    })
  .catch((err) => {
    imagePickerArea.style.display = 'block';
  });
};

$('#myImg').click(function() {
	alert('alert');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	 	if (this.readyState == 4 && this.status == 200) {
	    	var response = this.responseText;

	    	if(response=='SI'){
	    		document.getElementById('myImg').src = 'src/sip.png';
	    	} else {
				document.getElementById('myImg').src = 'src/nop.png';
	    	}
	  	}
	}
	xmlhttp.open("GET", "valida_foto.php", true);
	xmlhttp.send();
});