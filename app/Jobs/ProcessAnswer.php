<?php

namespace App\Jobs;

use App\Answer;
use App\Form;
use App\Mail\AnswerMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessAnswer implements ShouldQueue {
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	//
	private $answerId;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct($answerId) {
		$this->answerId = $answerId;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle() {
		echo "Processing asnwer: " . $this->answerId . PHP_EOL;

		$answer = Answer::find($this->answerId);
		$form = Form::find($answer->form_id);

		if (strlen($form->feedback_email) > 0) {
			$mails = explode(';', $form->feedback_email);

			foreach ( $mails as $mail ) {
				$mail = trim($mail);
				Mail::to($mail)->send(new AnswerMail($this->answerId));
			}
		}
	}
}
