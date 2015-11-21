<template>
  	<div class="col-md-10 col-sm-12 sider-wrapper">
		<div class="title-bar row">
			<span class="font-25">Sider</span>
			<div class="avarta">
				<span class="font-10">JAN-BØRRE HÅHEIM</span>
				<img src="../../img/icons/avarta.png" alt="">
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-sm-12">
				<div class="edit-wrapper">
					<div class="form-group">
						<input type="text" class="form-control input-lg">
					</div>
					<div id="summernote"></div>
					<button class="accordion active">Søkemotoroptimalisering</button>
					<div class="panel col-md-12">
						<div class="form-group">
							<p class="input-label">
								<label for="">Meta tittel</label>
								<span>Maximum 60 characters</span>
							</p>
							<input type="text" class="form-control input-lg">
						</div>
						<div class="form-group">
							<p class="input-label">
								<label for="">Metabeskrivelse</label>
								<span>Maximum 300 characters</span>
							</p>
							<input type="text" class="form-control input-lg">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-sm-12 update-btn">
				<button class="btn btn-lg">OPPDATER</button>
			</div>
		</div>
	</div>
</template>


<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
// import {mapGetters} from 'vuex';
export default {
    data(){
		return{}
	}
}
	
</script>
