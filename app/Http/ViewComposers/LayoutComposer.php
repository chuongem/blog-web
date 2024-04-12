<?php
namespace App\Http\ViewComposers;

use App\Services\API\BlogApi;
use Illuminate\View\View;

class LayoutComposer
{
    private $nav;
    private $category;
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct(BlogApi $blogApi)
    {
        $this->nav = $blogApi->getNavigation();
        $this->category = $blogApi->getCategory();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'category' => $this->category,
            'nav' => $this->nav,
        ]);
    }
}
