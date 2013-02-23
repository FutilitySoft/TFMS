function OpenImageWindow(filespec)
{
	var popupImg = window.open("images/"+filespec,"ImageWindow","width=810,height=610");
	popupImg.focus();
}
