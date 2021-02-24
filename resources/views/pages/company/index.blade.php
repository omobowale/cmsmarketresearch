<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pages >> ') }}
            @include('pages.navbar', ["id" => 2])
        </h2>
    </x-slot>

    <x-slot name="slot">
        @include("pages.commons", ["id" => 2, "image_url" => asset('images/about-us-banner.jpg'), "name" => "About", "intro_text" => "We deliver strategies that empower customers to focus on core business strategies and requirements", "button_text" => "learn more", "meta_title" => "About | MarketResearchHelp", "meta_description" => "MarketResearchHelp delivers strategies that empower customers to focus on core business strategies and requirements"])
        @include("pages.commons", ["id" => 2, "image_url" => asset('images/testimonials-banner.jpg'), "name" => "Testimonial", "intro_text" => "Our customers are always happy. Check out our success stories.", "button_text" => "Read stories", "meta_title" => "Testimonials | MarketResearchHelp", "meta_description" => "Our main focus at MarketResearchHelp is to make our customers happy."])
        @include("pages.commons", ["id" => 2, "image_url" => asset('images/sample-banner.jpg'), "name" => "Sample", "intro_text" => "Our sample projects and works", "button_text" => "Explore", "meta_title" => "Sample | MarketResearchHelp", "meta_description" => "Our sample projects and works are exceptional"])
        @include("pages.commons", ["id" => 2, "image_url" => asset('images/team-members-banner.jpg'), "name" => "Team Member", "intro_text" => "Meet our team of exceptional intellects", "button_text" => "View", "meta_title" => "Team Members | MarketResearchHelp", "meta_description" => "MarketResearchHelp has a team of passionate and exceptional intellects who are professionally equipped and always ready to help"])
        @include("pages.commons", ["id" => 2, "image_url" => asset('images/tandc-banner.jpg'), "name" => "Terms And Condition", "intro_text" => "Our terms and condition to serve you right", "button_text" => "Read", "meta_title" => "Terms and Condition | MarketResearchHelp", "meta_description" => "At MarketResearchHelp, our terms and condition are simple while still upholding our integrity in serving you well"])
    </x-slot>
    
</x-app-layout>