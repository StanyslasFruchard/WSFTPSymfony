<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reply;
use AppBundle\Entity\Subject;
use AppBundle\Form\Type\ReplyType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * @Route(path="/reply")
 */
class ReplyController extends Controller
{
    /**
     * @Route(path="/{id}/vote/up", methods={"GET"}, name="reply_vote_up")
     * @Template()
     */
    public function replyVoteUpAction($id)
    {
      $reply = $this->getDoctrine()->getRepository(Reply::class)->find($id);
      $votes= $reply->getVotes();
      $votes = $votes + 1;
        $reply->setVotes($votes);
      $this->getDoctrine()->getManager()->flush();

      return $this->redirectToRoute('subject_single', ['id' => $reply->getSubject()->getId()]);
    }
    
    /**
     * @Route(path="/{id}/vote/down", methods={"GET"}, name="reply_vote_down")
     * @Template()
     */
    public function replyVoteDownAction($id)
    {
        $reply= $this->getDoctrine()->getRepository(Reply::class)->find($id);
      $votes= $reply->getVotes();
      $votes = $votes - 1;
        $reply->setVotes($votes);
      $this->getDoctrine()->getManager()->flush();

      return $this->redirectToRoute('subject_single', ['id' => $reply->getSubject()->getId()]);
    }
    
    /**
     * @Route(path="/{id}/delete", methods={"GET"}, name="reply_delete")
     * @Template()
     */
    public function replyDeleteAction($id)
    {
        $reply = $this->getDoctrine()->getRepository(Reply::class)->find($id);
        $deleteReply = $this->getDoctrine()->getManager();
        $deleteReply->remove($reply);
        $deleteReply->flush();
        $subjectId = $reply->getSubject()->getId();

        return $this->redirectToRoute('subject_single', [ 'id' => $subjectId]);
    }
}