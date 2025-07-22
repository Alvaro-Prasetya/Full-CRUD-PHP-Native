    <!-- Load ckeditor cdn -->
      <script defer>
        new DataTable('#tabel');

		const {
			ClassicEditor,
			Essentials,
			Bold,
			Italic,
			Font,
			Paragraph
		} = CKEDITOR;

		ClassicEditor
			.create( document.querySelector( '#alamat' ), {
				licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3ODQ2NzgzOTksImp0aSI6ImExOGI2YmVmLTExN2UtNGM0Yy1iYTZkLWUzOGJiNjI4YjlkZSIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCIsIkUyUCIsIkUyVyJdLCJ2YyI6IjQ4YzA1YTE2In0.J2IryDWsFEdiJorRwudYkTrcMYo6HpjH81B4OtekW1sLGEKzE627uwybb5UcgYWijwNf2nDex0CQyEW-taQqoA',
				plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
				toolbar: [
					'undo', 'redo', '|', 'bold', 'italic', '|',
					'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
				]
			} )
				.then( editor => {
					window.editor = editor;
				} )
				.catch( error => {
					console.error( error );
				} );
	 </script>
</body>

</html>