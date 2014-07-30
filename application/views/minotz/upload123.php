<?php echo $error;?>
<br/>
<?php echo form_open_multipart('upload123/do_upload');?>

<input type="file" name="userfile" size="20" multiple="true" />

<br /><br />

<input type="submit" value="upload" />

</form>