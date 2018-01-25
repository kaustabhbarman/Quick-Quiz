<?php

use Illuminate\Database\Seeder;
use App\Questions;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Questions::create([
        	'question'=>'Name of first Space Tourist of India ?',
        	'answer'=>'Santosh George'
        	]);
        Questions::create([
        	'question'=>'Name of the first Atomic Submarine of India ?',
        	'answer'=>'I.N.S Chakra'
        	]);
        Questions::create([
        	'question'=>'What is the name of first British to visit India ?',
        	'answer'=>'Hawkins'
        	]);
        Questions::create([
        	'question'=>'Name of the first election commissioner of India ?',
        	'answer'=>'Sukumar Sen'
        	]);
        Questions::create([
        	'question'=>'Name of the first university of India ?',
        	'answer'=>'Nalanda University.'
        	]);
        Questions::create([
        	'question'=>'Where is India\'s First nuclear centre ?',
        	'answer'=>'Tarapur'
        	]);
        Questions::create([
        	'question'=>'Name of the first Chinese pilgrim to visit India ?',
        	'answer'=>'Fa-hien'
        	]);
        Questions::create([
        	'question'=>'Name of first foreign recipient of Bharat Ratna ?',
        	'answer'=>'Khan Abdul Gaffar Khan'
        	]);
        Questions::create([
        	'question'=>'Where was the first Post Office opened in India ?',
        	'answer'=>'Kolkata in 1727'
        	]);
        Questions::create([
        	'question'=>'Name of the first deputy Prime Minister of India ?',
        	'answer'=>'Sardar Vallabh Bhai Patel'
        	]);
    }
}
