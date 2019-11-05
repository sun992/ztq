$(function()
{
	//生成下部小按钮
	var length = $('#slideshow_photo a').length;
	for(var i = 0; i < length; i++)
	{
		$('<div class="slideshow-bt" index="'+(length-i)+'"></div>').appendTo('#slideshow_footbar');
    }
    $('#slideshow_footbar .slideshow-bt:last').addClass('bt-on');
    $('#slideshow_footbar .slideshow-bt').mouseenter(function(e)
    {
		slideTo(this);
    });

	
    var indexAllowAutoSlide = true;
    $('#slideshow_wrapper').mouseenter(function()
    {
		indexAllowAutoSlide = false;
    }).mouseleave(function()
    {
		indexAllowAutoSlide = true;
    });

	//滚动
    setInterval(function()
    {
		if (indexAllowAutoSlide) slideDown();
    },3000);

});

function slideDown()
{
	var currentBt = $('#slideshow_footbar .slideshow-bt.bt-on');
    if (currentBt.length <= 0) return;
    var nxt = currentBt.get(0).previousSibling;
    slideTo(nxt?nxt:$('#slideshow_footbar .slideshow-bt:last').get(0));
}

function slideTo(o)
{
	if (!o) return;
	var currentIndex = $('#slideshow_footbar .slideshow-bt.bt-on').attr('index'),
		current = $('#slideshow_photo a[index='+currentIndex+']');
	var nxt = $('#slideshow_photo a[index='+$(o).attr('index')+']');
	if (currentIndex == $(o).attr('index')) return;
	
	if (nxt.find('img[imgsrc]').length > 0)
	{
		var img =nxt.find('img[imgsrc]');
		img.attr('src',img.attr('imgsrc')).removeAttr('imgsrc');
	}
	
	$('#slideshow_footbar .slideshow-bt.bt-on').removeClass('bt-on');
	$(o).addClass('bt-on');
	
	nxt.css('z-index',2);
	
	current.css('z-index',3).fadeOut(500,function()
	{
		$(this).css('z-index','1').show();
		var img = nxt.next('a').find('img[imgsrc]');
		if (img.length > 0)
		{
			img.attr('src',img.attr('imgsrc')).removeAttr('imgsrc');
		}
	});
}
//slideshow end


$(function()
{
	//生成下部小按钮
	var length = $('#slideshow_photo2 a').length;
	for(var i = 0; i < length; i++)
	{
		$('<div class="slideshow-bt2" index="'+(length-i)+'"></div>').appendTo('#slideshow_footbar2');
    }
    $('#slideshow_footbar2 .slideshow-bt2:last').addClass('bt-on2');
    $('#slideshow_footbar2 .slideshow-bt2').mouseenter(function(e)
    {
		slideTo2(this);
    });

	
    var indexAllowAutoSlide2 = true;
    $('#slideshow_wrapper2').mouseenter(function()
    {
		indexAllowAutoSlide2 = false;
    }).mouseleave(function()
    {
		indexAllowAutoSlide2 = true;
    });

	//滚动
    setInterval(function()
    {
		if (indexAllowAutoSlide2) slideDown2();
    },3000);

});

function slideDown2()
{
	var currentBt2 = $('#slideshow_footbar2 .slideshow-bt2.bt-on2');
    if (currentBt2.length <= 0) return;
    var nxt = currentBt2.get(0).previousSibling;
    slideTo2(nxt?nxt:$('#slideshow_footbar2 .slideshow-bt2:last').get(0));
}

function slideTo2(o)
{
	if (!o) return;
	var currentIndex = $('#slideshow_footbar2 .slideshow-bt2.bt-on2').attr('index'),
		current = $('#slideshow_photo2 a[index='+currentIndex+']');
	var nxt = $('#slideshow_photo2 a[index='+$(o).attr('index')+']');
	if (currentIndex == $(o).attr('index')) return;
	
	if (nxt.find('img[imgsrc]').length > 0)
	{
		var img =nxt.find('img[imgsrc]');
		img.attr('src',img.attr('imgsrc')).removeAttr('imgsrc');
	}
	
	$('#slideshow_footbar2 .slideshow-bt2.bt-on2').removeClass('bt-on2');
	$(o).addClass('bt-on2');
	
	nxt.css('z-index',2);
	
	current.css('z-index',3).fadeOut(500,function()
	{
		$(this).css('z-index','1').show();
		var img = nxt.next('a').find('img[imgsrc]');
		if (img.length > 0)
		{
			img.attr('src',img.attr('imgsrc')).removeAttr('imgsrc');
		}
	});
}
//slideshow end

