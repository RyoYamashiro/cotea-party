import { useState, useEffect, useReducer} from 'react';
import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

const initialState = {
  status: 1,
  buttonText: 'キャンセル'
};
const statusReducer = (state, action) => {
  switch(action.type){
    case 'apply': {
      return {
        status: 1,
        buttonText: 'キャンセル'
      }
    }
    case 'cancel': {
      return {
        status: 0,
        buttonText: '申請する'
      }
    }
    default: {
      throw new Error();
    }
  }
};
export default function SubscribeStatusButton() {
  const element = document.getElementById('subscribe_status_button');
  const party_id = Number(element.dataset.party);
  const user_id = Number(element.dataset.user);
  const [state, dispatch] = useReducer(statusReducer, initialState);

  useEffect(() => {
    axios.get(`/api/parties/subscribes/${party_id}/${user_id}`).
        then(response => {
          console.log('どうだ'+response.data)
          dispatch({type: 'cancel'})
        })
        .catch(response => dispatch({type: 'cancel'}));
  }, []);

  const handleClickSubmit = (e) => {
    e.preventDefault();
    if(state.status === 0){
      dispatch({type: 'apply'});
    }else if(state.status === 1 || state.status === 2){
      dispatch({type: 'cancel'});
    }else{
      dispatch({type: 'cancel'});
    }
    axios.post(`/api/parties/subscribes/${party_id}/${user_id}/${state.status}`)
        .then(response => console.log('then'))
        .catch(response => console.log(response))
  }
  return (
    <form>
      <button className="party-button edit" onClick={handleClickSubmit} status={state.status}>{state.buttonText}</button>
    </form>
  )
}
if (document.getElementById('subscribe_status_button')) {
    ReactDOM.render(<SubscribeStatusButton />, document.getElementById('subscribe_status_button'));
}
