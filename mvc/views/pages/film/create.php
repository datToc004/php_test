<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý phim</a></li>
				<li class="active">Thêm phim</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm phim</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form role="form" action="/php_test/Home/post_create" method="post"  enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label>Tên phim</label>
                                      <input  name="fname" id="fname" class="form-control" placeholder="" >
                                      <?php
                                        if(isset($data['err']['fname'])){
                                      ?>
                                        <div class="err"><?php if(isset($data['err']['fname']['req'])) echo $data['err']['fname']['req']; ?></div>
                                        <div class="err"><?php if(isset($data['err']['fname']['unique'])) echo $data['err']['fname']['unique']; ?></div>
                                      <?php }?>
                                      <div id="message"></div>
                                  </div>
                                  <div class="form-group">
                                      <label>Tên đạo diễn</label>
                                      <input  name="dname" type="text" class="form-control" >
                                      <?php
                                        if(isset($data['err']['dname'])){
                                      ?>
                                        <div class="err"><?php if(isset($data['err']['dname']['req'])) echo $data['err']['dname']['req']; ?></div>
                                        
                                      <?php }?>
                                  </div>    
                                  <div class="form-group">
                                      <label>Thể loại phim</label>
                                      <input  name="tname" type="text" class="form-control">
                                      <?php
                                        if(isset($data['err']['tname'])){
                                      ?>
                                        <div class="err"><?php if(isset($data['err']['tname']['req'])) echo $data['err']['tname']['req']; ?></div>
                                        
                                      <?php }?>
                                  </div>                  
                                  <input name="submit" type="submit" class="btn btn-success" value="Thêm mới" >
                                  
                                </form>
                            </div>
                        
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#fname").keyup(function(){
        var nameCreate=$(this).val();
        $(".err").hide();
        // $("#message").html(nameCreate);
        $.post("/php_test/Ajax/checkNameCreate",{nameCreate:nameCreate},function(data){
          if(data=="true"){
            
            $("#message").html("Tên phim hợp lệ");
          }else{
            $("#message").html("Tên film đã tồn tại");
          }
          
        })
        
      });
    });
  </script>
	</div>	<!--/.main-->