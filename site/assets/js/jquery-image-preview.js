(function ($) {
    /**
     * Image Preview
     * 
     * 1. Get Image
     * 1.1 Create input file
     * 1.2 Execute event on click in input file
     * 2. Analysis image in format png or jpeg
     * 3. Convert Image to Base64
     * 4. Put result Base64 in source image
     * 5. Destroy input file
     * 
     * Ps.: Exception image in resolution defined data-width
     */
    var imageComponent = {
        resolution: {
            width: "",
            height: ""
        },
        name: "",
        id: ""
    };

    var inputfile = {
        nameinput: "file-input-imagepreview",
        idinput: "file-input-imagepreview",
        typeinput: "file",
        create: function (target) {
            this.destroy();
            inputComponent = document.createElement("input");

            inputComponent.type = this.typeinput;
            inputComponent.name = this.nameinput;
            inputComponent.id = this.idinput;
            inputComponent.style.display = "none";

            $(target).append(inputComponent);

            return true;
        },
        destroy: function () {
            $("#" + this.idinput).remove();
        }
    };

    var imageWrapPreview = {
        create: function () {
            imageWrap = document.createElement("img");
            imageWrap.name = imageComponent.name;
            imageWrap.id = imageComponent.id;

            return imageWrap;
        }
    }

    function init(componentimagepreview) {
        var imagewrap = componentimagepreview.find(".image-wrap");
        var btnimagepreview = componentimagepreview.find(".btn-image-preview");

        imagewrap.on("click", function () {
            wrapImage(componentimagepreview, imagewrap);
        });

        btnimagepreview.on("click", function () {
            wrapImage(componentimagepreview, imagewrap);
        });

        imageComponent.resolution.width = imagewrap.data("image-width");
        imageComponent.resolution.height = imagewrap.data("image-height");
        imageComponent.name = imagewrap.data("img-name");
        imageComponent.id = imagewrap.data("img-name");

        if ((typeof imageComponent.resolution.width === "undefined") || (typeof imageComponent.resolution.height === "undefined")) {
            imageComponent.resolution.width = imagewrap.width();
            imageComponent.resolution.height = imagewrap.height();
        }                
    }

    function printMessageError(wrapImage, message) {
        wrapImage.parent().find('.message').addClass("error");
        wrapImage.parent().find('.message').html(message);
    }

    function loadImageFile(wrapImage) {
        var oFReader = new FileReader(),
                rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

        var oFile = $('#' + inputfile.idinput)[0].files[0];

        if (!rFilter.test(oFile.type)) {
            printMessageError(wrapImage, "O arquivo selecionado é inválido.");
            return;
        }

        $(wrapImage).html(imageWrapPreview.create());

        oFReader.onload = function (oFREvent) {
            var img = new Image();

            img.src = oFREvent.target.result;

            img.onload = function () {
                var canvas = document.createElement("canvas");

                canvas.width = imageComponent.resolution.width;
                canvas.height = imageComponent.resolution.height;
                var ctx = canvas.getContext("2d");

                ctx.drawImage(this, 0, 0, imageComponent.resolution.width, imageComponent.resolution.height);

                $(wrapImage).find('img').attr('src', canvas.toDataURL());
            }

            img.src = oFREvent.target.result;
        };

        if ($('#' + inputfile.idinput)[0].files.length === 0) {
            return;
        }

        oFReader.readAsDataURL(oFile);
    }

    function wrapImage(target, imagewrap) {
        inputfile.create(target);        

        $('#' + inputfile.idinput).on("change", function () {
            loadImageFile(imagewrap);
            inputfile.destroy(target);
        });

        $('#' + inputfile.idinput).click();
        
        target.find('.message').removeClass("error");
        target.find('.message').html("");
    }

    $.fn.imagepreview = function () {
        init($(this));
    };
})(jQuery);


