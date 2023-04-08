@extends('layout.main')
@section('content')

{{ Breadcrumbs::render('terms') }}

<div class="block-space block-space--layout--spaceship-ledge-height"></div>
<div class="block faq">
    <div class="container container--max--xl">
        <div class="faq__header">
            <h1 class="faq__header-title">Terms And Conditions</h1>
        </div>
        <div class="faq__section">
            <div class="faq__section-body">
                <div class="faq__question">
                    <h5 class="faq__question-title">1. TERMS</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>By accessing the website at  http://www.fa-bt.com ,
                                you are agreeing to be bound by these terms of service,
                                all applicable laws and regulations, and agree that you are
                                responsible for compliance with any applicable local laws.
                                If you do not agree with any of these terms, you are prohibited
                                from using or accessing this site. The materials contained in this
                                website are protected by applicable copyright and trademark law.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">2. USE LICENSE</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>2.1 Permission is granted to temporarily download one copy of the materials
                                (information or software) on FUTURE ART BROADCAST TRADING LLC's website for
                                personal, non-commercial transitory viewing only. This is the grant of a license,
                                 not a transfer of title, and under this license you may not:
                            </p>
                            <ul>
                                <li>Modify or copy the materials;</li>
                                <li>Use the materials for any commercial purpose, or for any public display (commercial or non-commercial)</li>
                                <li>Attempt to decompile or reverse engineer any software contained on FUTURE ART BROADCAST TRADING LLC's website;</li>
                                <li>Remove any copyright or other proprietary notations from the materials</li>
                                <li>Transfer the materials to another person or "mirror" the materials on any other server.</li>
                            </ul>
                            <p>
                                2.2 This license shall automatically terminate if you violate any of these
                                restrictions and may be terminated    by FUTURE ART BROADCAST TRADING LLC at any time.
                                Upon terminating your viewing of these materials or upon the termination of this license,
                                you must destroy any downloaded materials in your possession whether in electronic or printed format.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">3. DISCLAIMER</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p>The materials on FUTURE ART BROADCAST TRADING LLC's website are provided on an 'as is' basis.
                                FUTURE ART BROADCAST TRADING LLC makes no warranties, expressed or implied, and hereby disclaims
                                and negates all other warranties including, without limitation, implied warranties or conditions of
                                merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other
                                violation of rights.
                            </p>
                            <p>
                                Further, FUTURE ART BROADCAST TRADING LLC does not warrant or make any representations concerning
                                the accuracy, likely results, or reliability of the use of the materials on its website or otherwise
                                relating to such materials or on any sites linked to this site.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">4. LIMITATIONS</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p> In no event shall FUTURE ART BROADCAST TRADING LLC or its suppliers be liable for any damages
                                (including, without limitation, damages for loss of data or profit, or due to business interruption)
                                arising out of the use or inability to use the materials on FUTURE ART BROADCAST TRADING LLC's website,
                                 even if FUTURE ART BROADCAST TRADING LLC or a FUTURE ART BROADCAST TRADING LLC authorized representative
                                  has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do
                                   not allow limitations on implied warranties, or limitations of liability for consequential or
                                   incidental damages, these limitations may not apply to you.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">5. ACCURACY OF MATERIALS</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p> The materials appearing on FUTURE ART BROADCAST TRADING LLC's website could include technical,
                                typographical, or photographic errors. FUTURE ART BROADCAST TRADING LLC does not warrant that any
                                of the materials on its website are accurate, complete or current. FUTURE ART BROADCAST TRADING LLC
                                may make changes to the materials contained on its website at any time without notice. However
                                FUTURE ART BROADCAST TRADING LLC does not make any commitment to update the materials.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">6. LINKS</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p> FUTURE ART BROADCAST TRADING LLC has not reviewed all of the sites linked to its
                                website and is not responsible for the contents of any such linked site. The inclusion of
                                any link does not imply endorsement by FUTURE ART BROADCAST TRADING LLC of the site. Use of
                                any such linked website is at the user's own risk.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">7. MODIFICATIONS</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p> FUTURE ART BROADCAST TRADING LLC may revise these terms and conditions for
                                its website at any time without notice. By using this website you are agreeing
                                to be bound by the then current version of these terms and conditions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq__question">
                    <h5 class="faq__question-title">8. GOVERNING LAWS</h5>
                    <div class="faq__question-answer">
                        <div class="typography">
                            <p> These terms and conditions are governed by and construed in accordance
                                with the laws of the United Arab Emirates and you irrevocably submit to the
                                exclusive jurisdiction of the courts in that State or location.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq__footer">
            <div class="faq__footer-title">Still Have A Questions?</div>
            <div class="faq__footer-subtitle">We will be happy to answer any questions you may have.</div>
            <a href="{{route('contact')}}" class="btn btn-primary">Contact Us</a>
        </div>
    </div>
</div>

<div class="block-space block-space--layout--before-footer"></div>


@endsection
