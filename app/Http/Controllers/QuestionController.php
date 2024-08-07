<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use CodeCoz\AimAdmin\Controller\AbstractAimAdminController;
use CodeCoz\AimAdmin\Field\IdField;
use CodeCoz\AimAdmin\Field\TextField;

use App\Contracts\Repositories\QuestionRepositoryInterface;
use App\Contracts\Services\QuestionServiceInterface;

class QuestionController extends AbstractAimAdminController
{
    private QuestionServiceInterface $questionService;

    public function __construct(private readonly QuestionRepositoryInterface $repo, QuestionServiceInterface $questionService)
    {
        $this->questionService = $questionService;
    }

    public function getRepository()
    {
        return $this->repo;
    }

    public function configureActions(): iterable
    {
        return [

        ];
    }

    public function configureForm()
    {
        $fields = [
            IdField::init('id'),
            // TextareaField::init('my_remarks')
        ];
        $this->getForm($fields)
            ->setName('form_name')
            ->setMethod('post')
            ->setActionUrl(route('set_route'));
    }

    public function create()
    {
        $this->initCreate();
        return view('aim-admin::create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->initStore($request);

    }

    public function configureFilter(): void
    {
        $fields = [
            TextField::init('id'),
            // TextField::init('other')
        ];
        $this->getFilter($fields);
    }

    public function list()
    {
        $this->initGrid(['id'], pagination: 10);
        return view('aim-admin::list');
    }

    public function show($id)
    {
        $this->initShow($id, ['id', 'created_at']);
        return view('aim-admin::show');
    }

    public function edit($id)
    {
        $this->initEdit($id);
        return view('aim-admin::edit');
    }

    public function delete($id)
    {
     // Set your delete functionality
    }


    public function showQuizForm()
    {
        // Retrieve 10 questions from the database
        $questions = $this->questionService->showQuizForm();
        // $questions = Question::with('options')->take(10)->get();

        return view('question.create', compact('questions'));
    }

    public function submitQuiz(Request $request)
    {
        // Process the submitted quiz data
        $this->questionService->submitQuiz($request->all());
        return redirect()->route('question.create')->with('success', 'Questions created successfully!');
    }

}
