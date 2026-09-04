<?php

namespace App\ViewComposers;

use App\Models\Academy;
use App\Models\Course;
use App\Models\University;
use Illuminate\View\View;

class SiteHeaderComposer
{
    public function compose(View $view): void
    {
        $universities = University::where('status', 'active')->get();

        $view->with('megaMenu', $this->buildMegaMenu())
            ->with('universities', $universities)
            ->with('coursesByCategory', $this->coursesByCategory())
            ->with('secMenuItems', $this->secMenuItems());
    }

    protected function buildMegaMenu(): array
    {
        $menu = [];

        $universities = University::where('status', 'active')->get();

        foreach ($universities as $university) {
            $menu[] = [
                'target' => $university->slug,
                'label' => $university->name,
                'category' => 'universities',
                'university_slug' => $university->slug,
                'logo' => $university->logo,
                'card_class' => $this->cardClassFor($university->slug),
            ];
        }
        return $menu;
    }

    protected function coursesByCategory(): array
    {
        $byCategory = [];

        $courses = Course::where('status', 'published')
            ->with('courseCategory', 'university', 'academy')
            ->get();

        foreach ($courses as $course) {
            $slug = $course->courseCategory?->slug ?? 'uncategorized';

            $byCategory[$slug] = $byCategory[$slug] ?? collect();
            $byCategory[$slug] = $byCategory[$slug]->push($course);

            if ($course->university_id && $course->university) {
                $byCategory[$course->university->slug] = $byCategory[$course->university->slug] ?? collect();
                $byCategory[$course->university->slug] = $byCategory[$course->university->slug]->push($course);
            }
        }
        return $byCategory;
    }

    protected function secMenuItems(): array
    {
        $items = [];

        // $academies = Academy::where('status', 'active')
        //     ->get();

        // foreach ($academies as $academy) {
        //     $items[] = [
        //         'url' => '/' . $academy->slug,
        //         'label' => $academy->name,
        //     ];
        // }


        $courses = Course::where('status', 'published')
            ->withWhereHas('academy')
            ->get();

        foreach ($courses as $course) {
            $items[] = [
                'url' => '/' . $course->slug,
                'label' => $course->name,
            ];
        }

        return $items;
    }

    protected function cardClassFor(string $slug): ?string
    {
        return match ($slug) {
            'offensive-security', 'offensive' => 'offensive-course',
            'cyber-security' => 'ecu-course',
            'data-science' => 'isc-course',
            'comptia' => 'comptia-course',
            'isaca' => 'isaca-course',
            default => null,
        };
    }
}
