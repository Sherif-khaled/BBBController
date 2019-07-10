## An IP Input (jQuery Plugin)

### Usage

```html
<div id="ip"></div>

<script src="jQuery.min.js">
<script src="ipInput.min.js">
<script>
  $('#ip').ipInput()
</script>
```
###init

`$(dom).ipInput()` or `$(dom).ipInput('127.0.0.1')`

It will return an plugin instance

### API

* instance.getIp()

get the IP, or use $(dom).getIp()

* instance.setIp(String)

set the IP

* instance.validate()

judge if the IP is true or not null, or use $(dom).validate()