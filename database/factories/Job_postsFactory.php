<?php

namespace Database\Factories;
use App\Models\Job_posts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job_posts>
 */
class Job_postsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Job_posts::class;

    public function definition(): array
    {   $SouthAfricanCities = [
        'Johannesburg',
            'Cape Town',
            'Durban',
            'Pretoria',
            'Port Elizabeth',
            'Bloemfontein',
            'East London',
            'Polokwane',
            'Kimberley',
            'Nelspruit'
    ];
    
        return [
            'title' => $this->faker->jobTitle,
            'company' => $this->faker->company,
            'location' => $this->faker->randomElement($SouthAfricanCities),
            'description' => $this->faker->randomElement([
                'We are looking for a passionate and experienced software developer to join our team and help build innovative web applications.',
                'Join a fast-growing digital marketing agency in Cape Town. You will manage client campaigns and optimise social media content.',
                'An established logistics company is hiring an admin assistant to handle documentation, client calls, and support services.',
                'We need a junior graphic designer who can create engaging visuals for our brand and marketing campaigns.',
                'A leading retail group is hiring sales consultants for various Gauteng branches. Strong customer service skills required.',
                'Remote opportunity for a skilled data analyst to work on financial and business reports. Excel and SQL experience preferred.',
                'Join our Johannesburg-based fintech startup as a full-stack developer working with Laravel and React.',
                'We are seeking a warehouse supervisor with experience in inventory management and staff coordination.',
                'Exciting opportunity for a recent graduate to join our internship programme in HR and talent development.',
                'We are hiring a project manager to oversee construction projects in Limpopo. PMP certification is an advantage.'
            ]),
            'employment_type' => $this->faker->randomElement(['full-time', 'part-time', 'contract']),
            'salary_range' => $this->faker->randomElement(['R10,000 - R20,000','R20,000 - R30,000', 'R30,000 - R40,000','Negotiable']),
            'is_active' => $this->faker->boolean,
            'published_at' => now()
          
        
        ];
    }
}
