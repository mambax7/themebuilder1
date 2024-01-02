<script src="./mlib-includes/js/init.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
$('.picurlbtn').mlibready({returnto:'.classOne', maxselect:1});
});
</script>
<style>
img.mfn-opts-screenshot {
    max-width: 339px;
}
a.mfn-opts-upload-remove {
    background: url(http://localhost/options/img/ico-cross.png) no-repeat left center;
    padding-left: 18px;
    line-height: 31px;
    text-decoration: none;
    display: block;
}
a.picurlbtn {
    height: 34px;
    line-height: 34px;
    color: #787878;
    border: 2px solid #ebecec;
    text-decoration: none;
    background: #fff;
    padding: 0 17px;
    font-weight: bold;
}
a.picurlbtn:hover {
    background: #f0f5f5;
}
.thumbnail {
  border: 1px solid silver;
    box-sizing: border-box;
    display: block;
    font: 11px tahoma;
    margin: 5px 15px;
    padding: 5px;
    resize: none;
    width: 210px;

}
</style>
<div class="up">
	<input type="input" name="mfn-rows[bg_image][]" value="" class="image">
	<img class="mfn-opts-screenshot" src="http://localhost/options/fields/upload/blank.png">
	<a href="javascript:void(0);" data-choose="Choose a File" data-update="Select File" class="picurlbtn"><span></span>Browse</a> 
	<a href="javascript:void(0);" class="mfn-opts-upload-remove" style="display:none;">Remove Upload</a>

</div>
<div class="up">
	<input type="input" name="mfn-rows[bg_image1][]" value="" class="image">
	<img class="mfn-opts-screenshot" src="http://localhost/options/fields/upload/blank.png">
	<a href="javascript:void(0);" data-choose="Choose a File" data-update="Select File" class="picurlbtn"><span></span>Browse</a> 
	<a href="javascript:void(0);" class="mfn-opts-upload-remove" style="display:none;">Remove Upload</a>
</div>