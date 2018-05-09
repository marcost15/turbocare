function domTableEnhance()
{
	if(!document.createTextNode){return;}
	var tableClass='enhancedtable';
	var colourClass='enhancedtablecolouredrow';
	var hoverClass='enhancedtablerowhover';
	var activeClass='enhancedtableactive';
	var alltables,bodies,i,j,k,addClass,trs,c,a;
	alltables=document.getElementsByTagName('table');
	for (k=0;k<alltables.length;k++)
	{
		if(!alltables[k].className.match(tableClass)){continue;}
		bodies=alltables[k].getElementsByTagName('tbody');
		for (i=0;i<bodies.length;i++)
		{
			trs=bodies[i].getElementsByTagName('tr')
			for (j=0;j<trs.length;j++)
			{
				if(trs[j].getElementsByTagName('td').length>0)
				{
					addClass=j%2==0?' '+colourClass:'';
					trs[j].className=trs[j].className+addClass;
					trs[j].onclick=function()
					{
						if(this.className.match(activeClass))
						{
							var rep=this.className.match(' '+activeClass)?' '+activeClass:activeClass;
							this.className=this.className.replace(rep,'');
						} else {
							this.className+=this.className?' '+activeClass:activeClass;
						}
					}
					trs[j].onmouseover=function()
					{
						this.className=this.className+' '+hoverClass;
					}
					trs[j].onmouseout=function()
					{
						var rep=this.className.match(' '+hoverClass)?' '+hoverClass:hoverClass;
						this.className=this.className.replace(rep,'');
					}
				}
			}
		}
	}		
} 
window.onload=domTableEnhance; 