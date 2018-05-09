<?php
/**
 * class MaskLoader
 *
 * Simple loader class which allows you to set a mask and fill it.
 * It will only return the mask when it's full.
 *
 * Methods:
 * ========
 * - setSearch( string|array $search )   - Set the search values (this has to be valid regex!)
 * - setMask( string $mask )             - Set the mask we should use
 * - fill( [string|array $replace] )     - Fill the mask with the replace values. When no replace values are given,
 *                                         A possible half filled mask will be returned
 * - isFull()                            - Check if the mask is full or not
 *
 * @author Teye Heimans
 * @package FormHandler
 */
class MaskLoader
{
    var $_mask;
    var $_search;
    var $_subject;

    /**
     * Constructor
     *
     * @return MaskLoader
     */
    function MaskLoader()
    {
    }

    /**
     * MaskLoader::setMask()
     *
     * Set the mask which should be used
     *
     * @param string $mask
     * @return void
     * @author Teye Heimans
     * @access public
     */
    function setMask( $mask )
    {
        $this->_mask = $mask;

    }

    /**
     * MaskLoader::fill()
     *
     * Fill the mask with the given replace values. When no argument
     * is given, a possible half filled mask will be returned
     *
     * @param string|array $replace
     * @return string
     * @author Teye Heimans
     * @access public
     */
    function fill( $replace = null, $limit = 1 )
    {    
        // do we have to return a half filled mask ?
        if( $replace === null )
        {            
            // dont we have a subject?  return an empty string
            if( !isset( $this->_subject ) || $this->_subject === null )
            {
                return '';
            }
            // we got a subject. replace the seach strings with nothing and return it
            else
            {
                // fill the mask with noting and return it
                if( is_array( $this->_search ) )
                {
                    $replace = array_fill( 0, count( $this->_search ), '');
                }
                else
                {
                    $replace = '';
                }

                // return the search strings with nothing
                return preg_replace( $this->_search, $replace, $this->_subject );
            }
        }

        // get a fresh copy from the mask if the last
        // subject was completly filled..
        if( !isset( $this->_subject ) || $this->_subject === null)
        {
            $this->_subject = $this->_mask;
        }

		/**
         * Preg backslash problems! See http://www.formhandler.net/?pg=9&id=3198
         */
        if( is_array( $replace ) )
        {
            foreach ( $replace as $key => $value )
            {
                $replace[$key] = str_replace('\\', '\\\\', $value);
                $replace[$key] = str_replace('$', '\$', $value);
            }
        }
        else
        {
            $replace = str_replace('\\', '\\\\', $replace);
            $replace = str_replace('$', '\$', $replace);
        }
		
        // do filling here
        $this->_subject = preg_replace ( $this->_search, $replace, $this->_subject, $limit );

		// check if the mask is not full yet...
        if( !$this->isFull() )
        {
            // The mask is not full yet.
            // Return an empty string
            return '';
        }

        // the mask is full! return the value and reset the subject..
        $html = $this->_subject;
        $this->_subject = null;

        // return the filled mask
        return $html;
    }

    /**
     * MaskLoader::setSearch()
     *
     * Set the values where we should search for
     *
     * @param string|array $search: An regex string or array with the values where we should search for
     * @return void
     * @access public
     * @author Teye Heimans
     */
    function setSearch( $search )
    {
        $this->_search = $search;

    }


    /**
     * MaskLoader::isFull()
     *
     * Check if the mask is full
     *
     * @return bool
     * @access public
     * @author Teye Heimans
     */
    function isFull()
    {
        // when there is no subject, it is not full ;-)
        if( $this->_subject === null )
        {
            return false;
        }

        if( is_array( $this->_search ) )
        {
            // walk all the search items
            foreach( $this->_search as $search )
            {
                // search string found ?
                if( preg_match( $search, $this->_subject) )
                {
                    // the subject is not full! There are items found!
                    return false;
                }
            }

            // none of the seach string was found! the subject is full!
            return true;
        }
        else
        {
            // check if the search string is found. If it is, it is not full!
            return !preg_match( $this->_search, $this->_subject);
        }
    }
}

?>