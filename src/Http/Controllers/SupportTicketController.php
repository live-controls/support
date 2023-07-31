<?php

namespace LiveControls\Support\Http\Controllers;

use LiveControls\Support\Models\SupportTicket;
use Illuminate\Http\Request;
use LiveControls\Support\Http\Requests\CreateSupportTicketRequest;

class SupportTicketController extends Controller
{
    public function index(){
        if(auth()->user()->support_member){
            $supportTickets = SupportTicket::orderBy('created_at', 'desc')->paginate();
            return view('livecontrols_support::team.index', ['supportTickets' => $supportTickets]);
        }

        $supportTickets = auth()->user()->supportTickets()->paginate();
        return view('livecontrols_support::user.index', ['supportTickets' => $supportTickets]);
    }

    public function show(SupportTicket $supportTicket){        
        //Check if user did create support ticket or if he is in support team
        if($supportTicket->user_id == auth()->id()){
            return view('livecontrols_support::user.show', ['supportTicket' => $supportTicket]);
        }
        elseif(auth()->user()->support_member){
            return view('livecontrols_support::team.show', ['supportTicket' => $supportTicket]);
        }
        return abort(403);
        
    }

    public function create(){
        if(auth()->user()->support_member){
            abort(403);
        }
        return view('livecontrols::support.user.create');
    }

    public function store(CreateSupportTicketRequest $request){
        $validated = $request->validated();

        $supportTicket = SupportTicket::create(array_merge($validated, [
            'user_id' => auth()->id()
        ]));

        if(!is_null($supportTicket)){
            return redirect()->route('livecontrols.support.index')->with('success', __('livecontrols::general.type_created', ['type' => __('livecontrols::support.support_ticket')]));
        }
        return redirect()->route('livecontrols.support.index')->with('exception', __('livecontrols::general.type_not_created', ['type' => __('livecontrols::support.support_ticket')]));
    }

    public function destroy(SupportTicket $supportTicket){ 
        //Check if user did create support ticket or if he is in support team
        if($supportTicket->user_id != auth()->id() && !auth()->user()->support_member){
            return abort(403);
        }

        if($supportTicket->delete()){
            return redirect()->route('livecontrols.support.index')->with('success', __('livecontrols::general.type_deleted', ['type' => __('livecontrols::support.support_ticket')]));
        }
        return redirect()->route('livecontrols.support.index')->with('exception', __('livecontrols::general.type__not_deleted', ['type' => __('livecontrols::support.support_ticket')]));
    }

    public function open(SupportTicket $supportTicket){
        $supportTicket->update([
            'open' => true
        ]);

        return redirect()->route('livecontrols.support.show', ['supportTicket' => $supportTicket])->with([
            'success', __('livecontrols::support.reopened')
        ]);
    }

    public function close(SupportTicket $supportTicket){
        $supportTicket->update([
            'open' => false
        ]);

        return redirect()->route('livecontrols.support.show', ['supportTicket' => $supportTicket])->with([
            'success', __('livecontrols::support.reopened')
        ]);
    }
}
