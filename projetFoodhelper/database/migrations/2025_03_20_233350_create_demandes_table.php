<?php

use App\Models\donation;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->foreignIdFor(donation::class)->constrained()->cascadeOnDelete();   
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->primary(['donation_id','user_id']);
            $table->string('type_aliment');
            $table-> integer('quantite');
            $table-> string('localisation');
            $table->boolean('attribue')->default(false); // Par défaut, la demande n'est pas attribuée
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
