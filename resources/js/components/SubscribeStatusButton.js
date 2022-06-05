import { useState, useEffect, useReducer} from 'react';
import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Box from '@mui/material/Box';
import Typography from '@mui/material/Typography';
import Modal from '@mui/material/Modal';
import ClassNames from 'classnames';

import Accordion from '@mui/material/Accordion';
import AccordionSummary from '@mui/material/AccordionSummary';
import AccordionDetails from '@mui/material/AccordionDetails';
import ExpandMoreIcon from '@mui/icons-material/ExpandMore';


let csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;

const initialState = {
  status: 0,
  buttonText: '申請する',
  buttonDeleteStyle: false
};
const statusReducer = (state, action) => {
  switch(action.type){
    case 'cancel': {
      return {
        status: 0,
        buttonText: '参加キャンセル',
        buttonDeleteStyle: true
      }
    }
    case 'apply': {
      return {
        status: 1,
        buttonText: '申請する',
        buttonDeleteStyle: false
      }
    }

    case 'loggedin': {
      return {
        status: 4,
        buttonText: '申請者一覧',
        buttonDeleteStyle: false
      }
    }
    default: {
      throw new Error();
    }
  }
};
const modalStyle = {
  position: 'absolute',
  borderRadius: '15px',
  top: '50%',
  left: '50%',
  transform: 'translate(-50%, -50%)',
  width: '50%',
  bgcolor: '#fcfeff',
  boxShadow: 10,
  p: 6,
  boxSizing: 'border-box',
};

const accordionStyle = {

  borderRadius: '15px',
  bgcolor: '#fcfeff',
  border: '4px solid #f5eadf',
  boxShadow: 1,
  boxSizing: 'border-box',
  '&:last-of-type': {
    borderRadius: '15px',
  }
};
export default function SubscribeStatusButton() {
  const element = document.getElementById('subscribe_status_button');
  const party_id = Number(element.dataset.party);
  const user_id = Number(element.dataset.user);
  const [state, dispatch] = useReducer(statusReducer, initialState);
  const [open, setOpen] = useState(false);
  const [data,setData] = useState([]);
  const handleOpen = () => {
    if(state.status === 4){
      axios.get(`/api/parties/subscribe/index/${party_id}`)
          .then(response => {
            setData(response.data);
          });
    }
    setOpen(true);
  };
  const handleClose = () => setOpen(false);

  const classNameButton = ClassNames({
    'party-button': true,
    'delete': state.buttonDeleteStyle,
  });

  useEffect(() => {
    axios.get(`/api/parties/subscribes/${party_id}/${user_id}`).
        then(response => {
          const subscribe = response.data.subscribe;
          const isLoggedIn = response.data.isLoggedin;
          if(isLoggedIn === true){
            dispatch({type: 'loggedin'});
          }else{
            if(subscribe.status === 1 || subscribe.status === 2){
              dispatch({type: 'cancel'});
            }else{
              dispatch({type: 'apply'});
            }
          }
        })
        .catch(response => dispatch({type: 'apply'}));
  }, []);

  const postStatus = (party_id, user_id, status) => {
    axios.post(`/api/parties/subscribes/${party_id}/${user_id}/${status}`)
        .then(response => console.log('then'))
        .catch(response => console.log(response));
  }
  const clickAcceptJoin = (e) => {
    e.preventDefault();

    postStatus(party_id, e.target.value, 2);
  }


  function ModalView(props){
    if(props.status === 1){
      return (
        <>
          <div className="input-holder">
            <p className="form-label">申請メッセージ</p>
            <input className="form-input" type="text" name="message" />
          </div>

          <input type="hidden" name="status" value="1" />
          <div className="button-holder">
            <input type="submit" className="form-button" value="申請する" />
          </div>
        </>
      );
    }else if(props.status === 4){
      return (
        <>
          <div className="title-wrapper">
            <h2 className="title">パーティー一覧</h2>
          </div>
          {data.map((subscribe, index) => (
            <Accordion key={index} sx={accordionStyle}>
              <AccordionSummary
                expandIcon={<ExpandMoreIcon />}
                aria-controls="panel1a-content"
                id="panel1a-header"
              >
                <Typography sx={{fontWeight: 'bold', fontSize: '23px'}}><a>{subscribe.name}</a></Typography>
              </AccordionSummary>
              <AccordionDetails
              sx={{borderTop: '4px solid #f5eadf'}}>
                  <p className="party-item-title">メッセージ</p>
                  <p className="subscribe-message">
                    {subscribe.message}
                  </p>
                  <div className="subscribe-button-wrapper">
                    <button className="subscribe-index-button" value={subscribe.id} onClick={clickAcceptJoin}>参加許諾</button>
                  </div>

              </AccordionDetails>
            </Accordion>
          ))}
        </>
      );
    }else{
      return (
        <>
          <input type="hidden" name="status" value="0" />
          <button className="subscribe-index-button">申請取消</button>
        </>
      );
    }
  }
  return (
    <>
      <button className={classNameButton} onClick={handleOpen} value={status}>{state.buttonText}</button>
      <Modal
        open={open}
        onClose={handleClose}
        aria-labelledby="modal-modal-title"
        aria-describedby="modal-modal-description"
      >
        <Box sx={modalStyle}>
          <form action="/parties/subscribes/" method="post" className="form subscribe-form">
            <ModalView status={state.status} />
            <input type="hidden" name="user_id" value={user_id} />
            <input type="hidden" name="party_id" value={party_id} />
            <input type="hidden" name="_token" value={csrf_token} />
          </form>
        </Box>
      </Modal>
    </>
  )
}
if (document.getElementById('subscribe_status_button')) {
    ReactDOM.render(<SubscribeStatusButton />, document.getElementById('subscribe_status_button'));
}
