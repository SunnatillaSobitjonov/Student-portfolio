<?php

test("Job belongs to Employer", function () {
    $employer = \App\Models\Employer::factory()->create();
    $job = \App\Models\Job::factory()->create([
        'employer_id' => $employer->id]);

    expect($job->employer->is($employer))->toBeTrue();
});

test("Job has many tags", function () {
    $job = \App\Models\Job::factory()->create();
    $job->tag('Frontend');

    expect($job->tags)->toHaveCount(1);
});
