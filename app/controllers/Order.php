<?php
    class Order extends Controller{
        public function getListOrder(){
            $dao = $this->callDAO('OrderDAO');
            $service = $this->callService('OrderService');
            $data = $service->getListOrder($dao);
            $data['style'] = 'order';
            $data['content'] = 'client/order';
            $this->callView('Layouts/LayoutClient',$data);
        }
    }