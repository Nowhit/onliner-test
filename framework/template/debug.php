<style type="text/css">
	
	fieldset.debug {
		display: block;
		margin: 10px; 
		padding: 10px; 
		border: 1px dashed #ffffff;
		background: #ab4343; 
		color: #ffffff;
		font-size: 11px;
		font-family: arial;
	}
	
	fieldset.debug label {
		color: #ffffff;
		font-weight: bold;
		font-size: 13px;
		width: 70px;
		text-align: right;
		
		display:-moz-inline-stack;
		display:inline-block;
		_overflow:hidden;
		zoom:1;
		*display:inline;
	}
	
</style>

<fieldset class="debug">
	
	<label>Error:</label> <?=$errno?> <br />
	
	<label>Message:</label> <?=$errstr?> <br />
	
	<label>File:</label> <?=$errfile?> <br />
	
	<label>Line:</label> <?=$errline?> <br />
	
</fieldset>