<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\QuizStoreRequest;
use App\Http\Requests\QuizUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
// use App\Http\Controllers\Helpers\Helper;


use CodeCoz\AimAdmin\Controller\AbstractAimAdminController;
use CodeCoz\AimAdmin\Field\IdField;
use CodeCoz\AimAdmin\Field\TextField;
use CodeCoz\AimAdmin\Field\Buttonfield;

use App\Contracts\Repositories\QuizRepositoryInterface;
use App\Contracts\Services\QuizServiceInterface;

use App\Http\Controllers\QuestionController;

class QuizController extends AbstractAimAdminController
{
    private QuizServiceInterface $quizService;



    // public function Method(Request $request)
    // {
    //     $helper = new Helper();
    //     $value = $helper->Method();
    //     $helper->setAttribute('name', 'value'); 
    // }



    
    public function __construct(private readonly QuizRepositoryInterface $repo, QuizServiceInterface $quizService)
    {
        $this->quizService = $quizService;
    }

    public function getRepository()
    {
        return $this->repo;
    }

    public function configureActions(): iterable
    {
        return [
            ButtonField::init(ButtonField::DETAIL)->linkToRoute('quiz.show'),
            ButtonField::init(ButtonField::EDIT)->linkToRoute('quiz.edit'),
            ButtonField::init(ButtonField::DELETE)->linkToRoute('quiz.delete'),
            ButtonField::init('new', 'new')->linkToRoute('quiz.create')->createAsCrudBoardAction(),
            ButtonField::init('submit')->createAsFormSubmitAction(),
            ButtonField::init('cancel')->linkToRoute('quiz.list')->createAsFormAction(),
            ButtonField::init('back')->linkToRoute('quiz.list')->createAsShowAction()->setIcon('fa-arrow-left'),
            ButtonField::init('btn_popup', 'Questions')->linkToRoute('question.create'),
        ];
    }

    public function configureForm()
    {
        $fields = [
            IdField::init('id'),
            
            TextField::init('title','Quiz Name'),

            TextField::init('timer','Duration'),
        ];
        // $rule = ''; 
        // $rule->Helper::getAttribute('route');
        $requestRoute = request()->attributes->get('route');
        $this->getForm($fields)
            ->setName('form_name')
            ->setMethod('post')
            ->setActionUrl(route('quiz.store'));
    }

    public function create()
    {
        $requestRoute = request()->attributes->set('route');
        $this->initCreate();
        return view('quiz.create');
    }

    public function store(QuizStoreRequest $request): RedirectResponse
    {
        $validated = $request-> validated();
        $validated['status'] = 'active';
        $this -> quizService -> store($validated);
        return redirect(route('quiz.list'))->with(['success'=>'Quiz has been created succesfully']);

    }

    public function configureFilter(): void
    {
        $fields = [
            TextField::init('id'),
            TextField::init('title'),
            // TextField::init('other')
        ];
        $this->getFilter($fields);
    }

    public function list()
    {
        $this->initGrid
        (
            ['id',
            'title', 
            'timer'],  
            
            pagination: 10
        
        );
        return view('quiz.list');
    }

    public function show($id)
    {
        $this->initShow($id, ['id','title', 'timer' ,'created_at','updated at']);
        return view('quiz.show');
    }

    public function edit($id)
    {
        $requestRoute = request()->attributes->get('route','quiz.update');
        // Helper::setAttribute('route','quiz.update');
        $this->initEdit($id);
        return view('quiz.edit');
    }

    public function update(QuizUpdateRequest $request): RedirectResponse
    {
        $validated = $request-> validated();
        $id= (int)$validated ['id'];
        unset($validated ['id']);
        $this -> quizService -> update($validated);
        return redirect(route('quiz.list'))->with(['success'=>'Quiz has been updated succesfully']);

    }

    public function delete($id)
    {
     if($this->quizService->delete((int)$id)){
        return redirect(route('quiz.list'))->with(['success'=>'Quiz has been removed succesfully']);

     }
    }

}
