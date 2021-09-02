
function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
} 
docReady(function() {
    const scanRegionCamera = document.getElementById('scanTypeCamera');
    const scanRegionFile = document.getElementById('scanTypeFile');
    const scanButton = document.getElementById('scanButton');
    const stopButton = document.getElementById('stopButton');
    const qrFileInput = document.getElementById('qrInputFile');
    const requestPermissionButton = document.getElementById('requestPermission');
    const selectCameraContainer = document.getElementById('selectCameraContainer');
    const cameraSelection = document.getElementById('cameraSelection');
    const scannedCodeContainer = document.getElementById('scannedCodeContainer');
    const fileInput = document.getElementById('qrInputFile');
    const feedbackContainer = document.getElementById('feedback');
    const statusContainer = document.getElementById('status');
    const SCAN_TYPE_CAMERA = "camera";
    const SCAN_TYPE_FILE = "file";
    // declaration of html5 qrcode
    const html5QrCode = new Html5Qrcode("qr", /* verbose= */ true);
    var currentScanTypeSelection = SCAN_TYPE_CAMERA;
    var codesFound = 0;
    var lastMessageFound = null;
    const setPlaceholder = () => {
        const placeholder = document.createElement("div");
        placeholder.className = "placeholder";
        document.getElementById('qr').appendChild(placeholder);
    }
    const setFeedback = message => {
        feedbackContainer.innerHTML = message;
    }
    const setStatus = status => {
        statusContainer.innerHTML = status;
    }
    const qrCodeSuccessCallback = qrCodeMessage => {
        setStatus("Se ha encontrado un codigo");       
        setFeedback("");
        if (lastMessageFound === qrCodeMessage.toLocaleLowerCase()) {
            return;
        }
        lastMessageFound = qrCodeMessage.toLocaleLowerCase();
        const result = document.createElement('div');
        $.ajax({
            type: "POST",
            url: 'lecturaQR.php',
            data: {"id_asiento":  qrCodeMessage},
            success: function(data) {    
                    document.getElementById('cuerpo_modal').innerHTML= data;
                    $('#qrmodal').modal('show');
                },
                error: function() {
                  alert('Hubo errores al tratar de grabar el asiento, favor intente luego');
                }             
            });
        // result.innerHTML = `Nuevo codigo encontrado: <strong>${qrCodeMessage}</strong>`;
        // result.innerHTML += `Deseas agregar este codigo a tu base de datos? `;
        
        scannedCodeContainer.appendChild(result);
    }
    const qrCodeErrorCallback = message => {
        setStatus("Escaneando");
    }
    const videoErrorCallback = message => {
        setFeedback(`Video Error, error = ${message}`);
    }
    const classExists = (element, needle) => {
        const classList = element.classList;
        for (var i = 0; i < classList.length; i++) {
            if (classList[i] == needle) {
                return true;
            }
        }
        return false;
    }
    const addClass = (element, className) => {
        if (!element || !className) throw "Both element and className mandatory";
        if (classExists(element, className)) return;
        element.classList.add(className);
    };
    const removeClass = (element, className) => {
        if (!element || !className) throw "Both element and className mandatory";
        if (!classExists(element, className)) return;
        element.classList.remove(className);
    }
    
    document.querySelectorAll("input[name='scan-type']").forEach(input => {
        input.addEventListener('change', onScanTypeSelectionChange);
    });
    requestPermissionButton.addEventListener('click', function() {
        if (currentScanTypeSelection != SCAN_TYPE_CAMERA) return;
        requestPermissionButton.disabled = true;
        Html5Qrcode.getCameras().then(cameras => {
            selectCameraContainer.innerHTML = `Seleccionar camara (${cameras.length})`;
            if (cameras.length == 0) {
                return setFeedback("Error: No se han encontrada camaras en este dispositivo");
            }
            for (var i = 0; i < cameras.length; i++) {
                const camera = cameras[i];
                const value = camera.id;
                const name = camera.label == null ? value : camera.label;
                const option = document.createElement('option');
                option.value = value;
                option.innerHTML = name;
                cameraSelection.appendChild(option);
            }
            cameraSelection.disabled = false;
            scanButton.disabled = false;
            scanButton.addEventListener('click', () => {
                if (currentScanTypeSelection != SCAN_TYPE_CAMERA) return;
                const cameraId = cameraSelection.value;
                cameraSelection.disabled = true;
                scanButton.disabled = true;
                // Start scanning.
                html5QrCode.start(
                    cameraId, 
                    {
                        fps: 10,
                        qrbox: 250
                    },
                    qrCodeSuccessCallback,
                    qrCodeErrorCallback)
                    .then(_ => {
                        stopButton.disabled = false;
                        setStatus("Escaneando");
                        setFeedback("");
                    })
                    .catch(error => {
                        cameraSelection.disabled = false;
                        scanButton.disabled = false;
                        videoErrorCallback(error);
                    });
            });
            stopButton.addEventListener('click', function() {
                stopButton.disabled = true;
                setStatus("Escanner pausado");
                html5QrCode.stop().then(ignore => {
                    cameraSelection.disabled = false;
                    scanButton.disabled = false;
                    scannedCodeContainer.innerHTML = "";
                    setPlaceholder();
                }).catch(err => {
                    stopButton.disabled = false;
                    setFeedback('Error');
                    setFeedback("Race condition, unable to close the scan.");
                });
            });
        }).catch(err => {
            requestPermissionButton.disabled = false;
            setFeedback(`Error: Unable to query any cameras. Reason: ${err}`);
        });
    });
    
});