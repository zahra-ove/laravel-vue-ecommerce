<?php

use App\Models\City;
use App\Models\Country;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\State;
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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();

            $table->foreignIdFor(Order::class)->constrained()->restrictOnDelete();
            $table->foreignIdFor(CustomerAddress::class)->constrained()->restrictOnDelete();
            $table->foreignIdFor(Country::class)->constrained();
            $table->foreignIdFor(model: City::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
