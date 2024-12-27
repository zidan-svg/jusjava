public function up()
{
    Schema::create('produks', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->integer('harga');
        $table->timestamps();
    });
}
